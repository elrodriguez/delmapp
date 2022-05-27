<?php

namespace Modules\Restaurant\Http\Livewire\Charge;

use Livewire\Component;
use Modules\Restaurant\Entities\RestOrder;

class ChargeOrderList extends Component
{
    public $orders = [];
    public $search;
    public $btnVouchers = false;

    public function getListeners()
    {
        return [
            "echo:order-charge,Restaurant\\OrderChargeCash" => 'getOrders'
        ];
    }

    public function render()
    {
        $this->getOrders();
        return view('restaurant::livewire.charge.charge-order-list');
    }

    public function ordersSearch()
    {
        $this->resetPage();
    }

    public function getOrders()
    {
        $this->orders = RestOrder::join('people', 'waiter_person_id', 'people.id')
            ->select(
                'people.full_name',
                'rest_orders.id',
                'rest_orders.customer_person_name',
                'rest_orders.total',
                'rest_orders.order_type',
                'rest_orders.created_at'
            )
            ->where('rest_orders.id', 'like', '%' . $this->search . '%')
            ->where('state', 'X')
            ->get();
    }
}
