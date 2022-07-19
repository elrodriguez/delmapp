<?php

namespace Modules\Restaurant\Http\Livewire\Deliveries;

use Livewire\Component;

class PendingDeliveries extends Component
{
    public function render()
    {
        return view('restaurant::livewire.deliveries.pending-deliveries');
    }
}
