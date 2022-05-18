<?php

namespace Modules\Restaurant\Http\Livewire\Attend;

use App\Models\UserEstablishment;
use Illuminate\Support\Facades\Auth;
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
        $this->getCommands();
        $this->getItems();
        if (count($this->table) > 0) {
            $this->xtables = RestTable::where('id', '<>', $this->table['id'])->get();
        }

        $this->dispatchBrowserEvent('rest-reselect2', ['success' => true]);
        return view('restaurant::livewire.attend.attend-re-order');
    }

    public function retableId($id)
    {
        $table = RestTable::find($id);
        $this->table_order = RestTableOrder::where([
            ['state', '=', '1'],
            ['table_id', '=', $id]
        ])->first();

        $this->order = RestOrder::where('id', $this->table_order->order_id)->first();
        $this->client = $this->order->customer_person_name;
        $this->table = array('id' => $table->id, 'name' => $table->name, 'total' => $this->order->total, 'order' => []);

        $order_commands = RestOrderCommand::where('order_id', $this->order->id)->get();

        foreach ($order_commands as $k => $order_command) {
            $this->order_items[$k] = [
                'id' => $order_command->command_id,
                'name' => null,
                'price' => $order_command->price,
                'requested_time' => $order_command->created_at,
                'quantity' => $order_command->quantity,
                'discount' => $order_command->discount,
                'subtotal' => $order_command->total,
                'type' => $order_command->command_type,
                'details' => $order_command->details,
            ];
        }

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
}
