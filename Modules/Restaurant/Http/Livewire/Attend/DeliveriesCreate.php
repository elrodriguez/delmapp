<?php

namespace Modules\Restaurant\Http\Livewire\Attend;

use App\Models\UserEstablishment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Inventory\Entities\InvItem;
use Modules\Inventory\Entities\InvLocation;
use Modules\Restaurant\Entities\RestCategoryCommand;
use Modules\Restaurant\Entities\RestCommand;
use Modules\Restaurant\Entities\RestOrder;
use Modules\Restaurant\Entities\RestOrderCommand;
use App\Events\Restaurant\OrderCommand;
use Illuminate\Support\Facades\Lang;

class DeliveriesCreate extends Component
{
    public $categories = [];
    public $category_id = 0;
    public $search;
    public $commands = [];
    public $items = [];
    public $order_items = [];
    public $client;
    public $discount;
    public $total = 0;
    public $delivery_man;

    public function mount()
    {
        $this->categories = RestCategoryCommand::where('status', true)->orderBy('id')->get();
    }

    public function render()
    {
        $this->recalculateTotal();
        $this->getCommands();
        $this->getItems();

        return view('restaurant::livewire.attend.deliveries-create');
    }

    public function getCommands()
    {
        $cat = $this->category_id;
        $this->commands = RestCommand::join('rest_com_cat_details', 'command_id', 'rest_commands.id')
            ->select(
                'rest_commands.id',
                'rest_commands.description',
                'rest_commands.price',
                'rest_commands.image',
                'rest_commands.stock',
                'rest_commands.internal_id'
            )
            ->when($cat != 0, function ($query) use ($cat) {
                $query->where('rest_com_cat_details.category_id', $cat);
            })
            ->where('rest_commands.description', 'like', '%' . $this->search . '%')
            ->orWhere('rest_commands.internal_id', '=', '%' . $this->search . '%')
            ->groupBy([
                'rest_commands.id',
                'rest_commands.description',
                'rest_commands.price',
                'rest_commands.image',
                'rest_commands.stock',
                'rest_commands.internal_id'
            ])
            ->get();
    }

    public function getItems()
    {
        $establishment = UserEstablishment::where('user_id', Auth::id())->where('main', true)->first();
        $warehouse = InvLocation::where('establishment_id', $establishment->id)->first();

        $this->items = InvItem::join('inv_assets', 'item_id', 'inv_items.id')
            ->select(
                'inv_items.id',
                'inv_items.sale_price AS price',
                'inv_items.name',
                'inv_assets.stock'
            )
            ->where('inv_assets.location_id', $warehouse->id)
            ->get();
    }

    public function addCommands($id, $name, $price)
    {

        $key = false;

        foreach ($this->order_items as $item) {
            if ($item['id'] == $id && $item['type'] == RestCommand::class) {
                $key = true;
            }
        }

        if ($key === false) {
            array_push($this->order_items, array(
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'requested_time' => Carbon::now(),
                'quantity' => 1,
                'discount' => 0,
                'subtotal' => $price,
                'type' => RestCommand::class,
                'details' => null
            ));

            $this->total = $this->total + $price;

            $this->dispatchBrowserEvent('restaurant-add-items-tray', ['success' => true]);
        }
    }
    public function addProducts($id, $name, $price)
    {

        $key = false;

        foreach ($this->order_items as $item) {
            if ($item['id'] == $id && $item['type'] == InvItem::class) {
                $key = true;
            }
        }


        if ($key === false) {
            array_push($this->order_items, array(
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'requested_time' => Carbon::now(),
                'quantity' => 1,
                'discount' => 0,
                'subtotal' => $price,
                'type' => InvItem::class,
                'details' => null
            ));

            $this->table['order'] = $this->order_items;
            $this->total = $this->total + $price;
            $this->table['total'] = $this->total;
            session([$array_key => $this->table]);

            $this->dispatchBrowserEvent('restaurant-add-items-tray', ['success' => true]);
        }
    }

    public function removeAllItems()
    {
        $this->total = 0;
        $this->order_items = [];
    }

    public function removeItems($key)
    {
        $p = $this->order_items[$key]['price'];
        $this->total = $this->total - $p;
        unset($this->order_items[$key]);
    }

    public function saveOrder()
    {
        if (count($this->order_items) > 0) {

            foreach ($this->order_items as $key => $val) {
                $this->validate([
                    'order_items.' . $key . '.quantity' => 'numeric|required'
                ]);
            }

            $order = RestOrder::create([
                'waiter_person_id' => Auth::user()->person_id,
                'customer_person_name' => $this->client,
                'discount' => $this->discount,
                'total' => $this->total
            ]);


            foreach ($this->order_items as $val) {
                RestOrderCommand::create([
                    'order_id' => $order->id,
                    'command_id' => $val['id'],
                    'command_type' => $val['type'],
                    'description' => $val['name'],
                    'quantity' => $val['quantity'],
                    'price' => $val['price'],
                    'discount' => $val['discount'],
                    'total' => $val['subtotal'],
                    'details' => $val['details']
                ]);
            }

            $this->clearForm();

            event(new OrderCommand());

            $this->dispatchBrowserEvent('rest-order-save', ['msg' => Lang::get('labels.successfully_registered')]);
        }
    }

    public function recalculateTotal()
    {

        if (count($this->order_items) > 0) {
            $total = 0;
            foreach ($this->order_items as $k => $item) {
                $this->order_items[$k]['quantity'] = $item['quantity'];
                $this->order_items[$k]['subtotal'] = number_format(($item['price'] * $item['quantity']), 2, '.', '');
                $total = $total + ($item['price'] * $item['quantity']);
            }
            $this->total = $total;
        }
    }

    public function clearForm()
    {
        $this->total = 0;
        $this->client = null;
        $this->order_items = [];
    }
}
