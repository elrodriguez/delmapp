<?php

namespace App\Http\Livewire\Landlord;

use App\Tenant;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CustomerList extends Component
{

    public function render()
    {
        return view('livewire.landlord.customer-list', [
            'customers' => Tenant::join('domains', 'tenant_id', 'tenants.id')
                ->select(
                    'domains.domain',
                    'tenants.id',
                    'tenants.data',
                )
                ->paginate(10)
        ]);
    }

    public function getCustomerUsers($database)
    {
        $users = DB::select('SELECT * FROM ' . $database . '.users');
        dd($users);
    }
}
