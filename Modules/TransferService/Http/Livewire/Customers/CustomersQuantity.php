<?php

namespace Modules\TransferService\Http\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;

class CustomersQuantity extends Component
{
    public $quantity;

    public function mount(){
        $this->quantity = Customer::count();
    }

    public function render()
    {
        return view('transferservice::livewire.customers.customers-quantity');
    }
}
