<?php

namespace Modules\Restaurant\Http\Livewire\Attend;

use App\Events\Restaurant\OrderCommand;
use App\Events\Restaurant\OrderChargeCash;
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

class AttendReOrder extends Component
{
    protected $listeners = ['showFormReOrder' => 'retableId'];

    public $table = [];
    public $table_order;
    public $order;
    public $table_id;
    public $categories = [];
    public $category_id = 0;
    public $search;
    public $commands = [];
    public $items = [];
    public $order_items = [];
    public $client;
    public $xtables = [];
    public $table_ids;
    public $discount;
    public $total = 0;
    public $table_orders;

    public function mount()
    {
        $this->categories = RestCategoryCommand::where('status', true)->orderBy('id')->get();
    }

    public function render()
    {
        $this->recalculateTotalRe();
        $this->getCommands();
        $this->getItems();
        if (count($this->table) > 0) {
            $this->xtables = RestTable::where('id', '<>', $this->table['id'])->where('occupied', false)->get();
        }

        $this->dispatchBrowserEvent('rest-reselect2', ['success' => true]);
        return view('restaurant::livewire.attend.attend-re-order');
    }

    public function retableId($id)
    {
        $this->order_items = [];
        $table = RestTable::find($id);
        $this->table_order = RestTableOrder::where([
            ['state', '=', '1'],
            ['table_id', '=', $id]
        ])->first();

        $this->order = RestOrder::where('id', $this->table_order->order_id)->first();

        if ($this->order->state == 'X') {
            $this->emit('setFreeTableAlert', $this->order->id);
        } else {
            $this->client = $this->order->customer_person_name;
            $this->table = array('id' => $table->id, 'name' => $table->name, 'total' => $this->order->total, 'order' => []);

            $this->getOrderCommansLoad($this->order->id);

            $table_orders = RestTableOrder::where([
                ['state', '=', '1'],
                ['order_id', '=', $this->order->id],
                ['table_id', '<>', $id]
            ])->get();
            $xtable_orders = [];
            if (count($table_orders) > 0) {
                foreach ($table_orders as $h => $table_order) {
                    $xtable_orders[$h] = $table_order->table_id;
                }
            }

            session(['rest_tab_id' => '#tab_default-3']);

            $this->dispatchBrowserEvent('restaurant-active-re-orders', ['tables_ids' => $xtable_orders]);
        }
    }


    public function getOrderCommansLoad($id)
    {
        $order_commands = RestOrderCommand::where('order_id', $id)
            ->get();

        foreach ($order_commands as $k => $order_command) {
            $this->order_items[$k] = [
                'oc_id' => $order_command->id,
                'id' => $order_command->command_id,
                'name' => $order_command->description,
                'price' => $order_command->price,
                'requested_time' => $order_command->created_at,
                'quantity' => (int) $order_command->quantity,
                'discount' => $order_command->discount,
                'subtotal' => $order_command->total,
                'type' => $order_command->command_type,
                'details' => $order_command->details,
                'state' => $order_command->state
            ];
        }
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

    public function addReCommands($id, $name, $price)
    {

        if (count($this->table) > 0) {
            //$key = array_search($id, array_column($this->order_items, 'id'));

            $key = false;

            foreach ($this->order_items as $item) {
                if (
                    $item['id'] == $id && $item['type'] == RestCommand::class
                ) {
                    $key = true;
                }
            }

            if ($key === false) {
                array_push($this->order_items, array(
                    'oc_id' => null,
                    'id' => $id,
                    'name' => $name,
                    'price' => $price,
                    'requested_time' => Carbon::now(),
                    'quantity' => 1,
                    'discount' => 0,
                    'subtotal' => $price,
                    'type' => RestCommand::class,
                    'details' => null,
                    'state' => 'P'
                ));

                $this->table['order'] = $this->order_items;
                $this->total = $this->total + $price;
                $this->table['total'] = $this->total;

                $this->dispatchBrowserEvent('restaurant-add-re-items-tray', ['success' => true]);
            }
        } else {
            $this->dispatchBrowserEvent('restaurant-active-re-tables', ['success' => true]);
        }
    }
    public function addReProducts($id, $name, $price)
    {

        //$key = array_search($id, array_column($this->order_items, 'id'));
        if (count($this->table) > 0) {

            $key = false;

            foreach ($this->order_items as $item) {
                if ($item['id'] == $id && $item['type'] == InvItem::class) {
                    $key = true;
                }
            }

            if ($key === false) {

                array_push($this->order_items, array(
                    'oc_id' => null,
                    'id' => $id,
                    'name' => $name,
                    'price' => $price,
                    'requested_time' => Carbon::now(),
                    'quantity' => 1,
                    'discount' => 0,
                    'subtotal' => $price,
                    'type' => InvItem::class,
                    'details' => null,
                    'state' => 'P'
                ));

                $this->table['order'] = $this->order_items;
                $this->total = $this->total + $price;
                $this->table['total'] = $this->total;

                $this->dispatchBrowserEvent('restaurant-add-re-items-tray', ['success' => true]);
            }
        } else {
            $this->dispatchBrowserEvent('restaurant-active-re-tables', ['success' => true]);
        }
    }

    public function removeAllReItems()
    {
        $new_order = RestOrder::find($this->order->id);
        if ($new_order->state == 'X' || $new_order->state == 'T') {
            $this->dispatchBrowserEvent('restaurant-not-cancel-order', ['success' => true]);
        } else {
            $this->total = 0;
            $this->order_items = [];
            $this->table['order'] = [];
            $this->table['total'] = $this->total;

            $tos = RestTableOrder::where('order_id', $this->order->id)->get();

            foreach ($tos as $to) {
                RestTable::where('id', $to->table_id)->update(['occupied' => false]);
            }

            RestTableOrder::where('order_id', $this->order->id)->delete();
            RestOrderCommand::where('order_id', $this->order->id)->delete();
            $this->order->delete();

            $this->total = 0;
            $this->client = null;
            $this->order_items = [];
            $this->table = [];

            $this->dispatchBrowserEvent('restaurant-active-re-tables', ['success' => true]);
        }
    }

    public function removeReItems($key)
    {
        $oc_id = $this->order_items[$key]['oc_id'];
        if ($oc_id) {
            RestOrderCommand::find($oc_id)->delete();
        }
        $p = $this->order_items[$key]['price'];
        $this->total = $this->total - $p;
        unset($this->order_items[$key]);
        $this->table['order'] = $this->order_items;
        $this->table['total'] = $this->total;
    }

    public function saveReOrder()
    {
        if (count($this->order_items) > 0) {

            foreach ($this->order_items as $key => $val) {
                $this->validate([
                    'order_items.' . $key . '.quantity' => 'numeric|required'
                ]);
            }

            $this->order->update([
                'waiter_person_id' => Auth::user()->person_id,
                'customer_person_name' => $this->client,
                'discount' => $this->discount,
                'total' => $this->total,
                'state' => 'P'
            ]);

            RestTableOrder::where('order_id', $this->order->id)
                ->where('table_id', '<>', $this->table['id'])
                ->delete();

            if (count($this->table_ids) > 0) {
                foreach ($this->table_ids as $table_id) {
                    RestTableOrder::create([
                        'table_id' => $table_id,
                        'order_id' => $this->order->id
                    ]);
                    RestTable::where('id', $table_id)->update(['occupied' => true]);
                }
            }

            //RestOrderCommand::where('order_id', $this->order->id)->delete();

            foreach ($this->order_items as $val) {

                $command = RestOrderCommand::where('order_id', $this->order->id)
                    ->where('command_id', $val['id'])->first();
                //dd($command);
                if ($command) {
                    $command->update([
                        'quantity' => $val['quantity'],
                        'discount' => $val['discount'],
                        'total' => $val['subtotal'],
                        'details' => $val['details']
                    ]);
                } else {
                    RestOrderCommand::create([
                        'order_id' => $this->order->id,
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
            }
            event(new OrderCommand());
            $this->dispatchBrowserEvent('rest-reorder-save', ['msg' => Lang::get('labels.successfully_registered')]);
        }
    }

    public function recalculateTotalRe()
    {

        if (count($this->order_items) > 0) {
            $total = 0;
            foreach ($this->order_items as $k => $item) {
                $this->order_items[$k]['quantity'] = $item['quantity'];
                $this->order_items[$k]['subtotal'] = number_format(($item['price'] * $item['quantity']), 2, '.', '');
                $total = $total + ($item['price'] * $item['quantity']);
            }
            $this->total = $total;

            $this->table['order'] = $this->order_items;
            $this->table['total'] = $this->total;
            $array_key = session('rest_table_id');
            session([$array_key => $this->table]);
        }
    }

    public function sendToBox()
    {
        RestOrder::find($this->order->id)->update([
            'state' => 'X'
        ]);

        event(new OrderChargeCash());

        $this->dispatchBrowserEvent('restaurant-active-re-tables-close-order', ['success' => true]);
    }
}
