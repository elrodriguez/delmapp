<?php

namespace Modules\Restaurant\Http\Livewire\Deliveries;

use Livewire\Component;
use Modules\Restaurant\Entities\RestOrder;

class PendingDeliveries extends Component
{
    public function mount(){

    }

    public function render()
    {
        return view('restaurant::livewire.deliveries.pending-deliveries',['orders' => $this->getOrders()]);
    }

    public function getOrders(){
        $orders = RestOrder::where('state', '<>', 'Z')
        ->where('order_type', 'D')
        ->get();
        return $orders;
    }
}
