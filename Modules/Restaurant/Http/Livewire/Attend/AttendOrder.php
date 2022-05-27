<?php

namespace Modules\Restaurant\Http\Livewire\Attend;

use App\Events\Restaurant\OrderCommand as RestaurantOrderCommand;
use App\Models\UserEstablishment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Livewire\Component;
use Modules\Inventory\Entities\InvItem;
use Modules\Inventory\Entities\InvLocation;
use Modules\Restaurant\Entities\RestCategoryCommand;
use Modules\Restaurant\Entities\RestCommand;
use Modules\Restaurant\Entities\RestOrder;
use Modules\Restaurant\Entities\RestOrderCommand;
use Modules\Restaurant\Entities\RestTable;
use Modules\Restaurant\Entities\RestTableOrder;


class AttendOrder extends Component
{
    public $table_id;
    public $categories = [];
    public $category_id = 0;
    public $search;
    public $commands = [];
    public $items = [];
    public $table;
    public $order_items = [];
    public $client;
    public $xtables = [];
    public $table_ids;
    public $discount;
    public $total = 0;

    protected $listeners = ['showFormOrder' => 'tableId'];

    public function mount()
    {
        $this->categories = RestCategoryCommand::where('status', true)->orderBy('id')->get();
    }

    public function render()
    {
        $this->recalculateTotal();
        if (session()->has('rest_table_id')) {
            $array_key = session('rest_table_id');

            $this->table = session($array_key);

            if (count($this->table) > 0) {
                $this->order_items = $this->table['order'];
                $this->xtables = RestTable::where('id', '<>', $this->table['id'])->where('occupied', false)->get();
                $this->total = $this->table['total'];
            }
        }

        $this->getCommands();
        $this->getItems();

        $this->dispatchBrowserEvent('rest-select2', ['success' => true]);

        return view('restaurant::livewire.attend.attend-order');
    }

    public function tableId($id)
    {
        $this->order_items = [];
        $this->table_id = $id;
        $table = RestTable::find($id);
        $this->table = array('id' => $table->id, 'name' => $table->name, 'total' => 0, 'order' => []);
        $array_key = 'M' . $id;

        session(['rest_table_id' => $array_key]);
        $tmp = session($array_key);

        if ($tmp) {
            $this->table = session($array_key);

            if (count($this->table) > 0) {

                $this->order_items = $this->table['order'];
            }
        } else {

            session([$array_key => $this->table]);
        }
        session(['rest_tab_id' => '#tab_default-2']);

        $this->dispatchBrowserEvent('restaurant-active-orders', ['success' => true]);
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
        $array_key = session('rest_table_id');

        if ($array_key) {
            //$key = array_search($id, array_column($this->order_items, 'id'));

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

                $this->table['order'] = $this->order_items;
                $this->total = $this->total + $price;
                $this->table['total'] = $this->total;
                session([$array_key => $this->table]);

                $this->dispatchBrowserEvent('restaurant-add-items-tray', ['success' => true]);
            }
        } else {
            $this->dispatchBrowserEvent('restaurant-active-tables', ['success' => true]);
        }
    }
    public function addProducts($id, $name, $price)
    {
        $array_key = session('rest_table_id');

        $key = false;

        foreach ($this->order_items as $item) {
            if ($item['id'] == $id && $item['type'] == InvItem::class) {
                $key = true;
            }
        }

        //$key = array_search($id, array_column($this->order_items, 'id'));

        if ($array_key) {
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
        } else {
            $this->dispatchBrowserEvent('restaurant-active-tables', ['success' => true]);
        }
    }

    public function removeAllItems()
    {
        $this->total = 0;
        $this->order_items = [];
        $this->table['order'] = [];
        $this->table['total'] = $this->total;
        $array_key = session('rest_table_id');
        session([$array_key => $this->table]);
    }

    public function removeItems($key)
    {
        $p = $this->order_items[$key]['price'];
        $this->total = $this->total - $p;
        unset($this->order_items[$key]);
        $this->table['order'] = $this->order_items;
        $this->table['total'] = $this->total;
        $array_key = session('rest_table_id');
        session([$array_key => $this->table]);
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

            RestTableOrder::create([
                'table_id' => $this->table['id'],
                'order_id' => $order->id
            ]);
            RestTable::where('id', $this->table['id'])->update(['occupied' => true]);
            if (count($this->table_ids) > 0) {
                foreach ($this->table_ids as $table_id) {
                    RestTableOrder::create([
                        'table_id' => $table_id,
                        'order_id' => $order->id
                    ]);
                    RestTable::where('id', $table_id)->update(['occupied' => true]);
                }
            }

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

            event(new RestaurantOrderCommand());

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
            //dd($this->total);
            $this->table['order'] = $this->order_items;
            $this->table['total'] = $this->total;
            $array_key = session('rest_table_id');
            session([$array_key => $this->table]);
        }
    }

    public function clearForm()
    {
        $this->total = 0;
        $this->client = null;
        $this->order_items = [];
        $this->table = [];
        $array_key = session('rest_table_id');
        session([$array_key => []]);
        session(['rest_table_id' => null]);
    }
}
