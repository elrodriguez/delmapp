<?php

namespace Modules\Restaurant\Http\Livewire\Orders;

use Livewire\Component;
use Modules\Restaurant\Entities\RestDeliveryMan;
use Modules\Restaurant\Entities\RestOrder;
use Modules\Restaurant\Entities\RestOrderCommand;
use Modules\Restaurant\Entities\RestTableOrder;

class OrdersList extends Component
{
    public $orders = [];
    public $orderId;

    public function getListeners()
    {
        return [
            "echo:resfresh-orders,Restaurant\\OrderCommand" => 'refreshOrders'
        ];
    }
    public function refreshOrders()
    {
        $this->getOrders();
    }

    public function render()
    {
        $this->orders = [];
        $this->getOrders();
        return view('restaurant::livewire.orders.orders-list');
    }

    public function getOrders()
    {

        $orders = RestOrderCommand::join('rest_orders', 'order_id', 'rest_orders.id')
            ->join('people', 'waiter_person_id', 'people.id')
            ->select(
                'rest_orders.id',
                'rest_orders.created_at AS order_created_at',
                'rest_orders.customer_person_name',
                'rest_orders.order_type',
                'people.full_name',
                'rest_order_commands.id AS command_id',
                'rest_order_commands.created_at AS command_created_at',
                'rest_order_commands.description',
                'rest_order_commands.quantity',
                'rest_order_commands.details',
                'rest_order_commands.command_local',
                'rest_order_commands.state AS command_state'
            )
            ->whereIn('rest_orders.state', ['P', 'S', 'C'])
            ->get();

        foreach ($orders as $k => $order) {
            $this->orders[$k] = [
                'id'                    => $order->id,
                'order_created_at'      => $order->order_created_at,
                'customer_person_name'  => $order->customer_person_name,
                'order_type'            => $order->order_type,
                'full_name'             => $order->full_name,
                'command_id'            => $order->command_id,
                'command_created_at'    => $order->command_created_at,
                'description'           => $order->description,
                'quantity'              => $order->quantity,
                'details'               => $order->details,
                'command_local'         => $order->command_local,
                'command_state'         => $order->command_state,
                'array_tables'          => $this->getOrderTables($order->id),
                'array_mens'            => $this->getDeliveryMan($order->id)
            ];
        }
    }

    public function getOrderTables($id)
    {
        $tables = RestTableOrder::join('rest_tables', 'table_id', 'rest_tables.id')
            ->select('rest_tables.name')
            ->where('order_id', $id)
            ->get();

        return $tables->toArray();
    }

    public function commandState($o, $id, $t)
    {
        RestOrderCommand::find($id)->update(['state' => $t]);
        RestOrder::find($o)->update(['state' => 'C']);
    }

    public function orderState($id)
    {
        $exists = RestOrder::where('id', $id)->exists();
        if ($exists) {
            RestOrder::find($id)->update(['state' => 'T']);
            RestOrderCommand::where('order_id', $id)->update(['state' => 'S']);
        }
    }
    public function getDeliveryMan($id)
    {
        $mens  = RestDeliveryMan::join('people', 'person_id', 'people.id')
            ->select(
                'people.full_name'
            )
            ->where('order_id', $id)
            ->get();
        $data = [];
        if (count($mens) > 0) {
            $data = $mens->toArray();
        }
        return $data;
    }
}
