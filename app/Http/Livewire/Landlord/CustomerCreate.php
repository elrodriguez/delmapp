<?php

namespace App\Http\Livewire\Landlord;

use App\Models\UserEstablishment;
use App\Tenant;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use Modules\Inventory\Entities\InvLocation;
use Modules\Setting\Entities\SetCompany;
use Modules\Setting\Entities\SetEstablishment;

class CustomerCreate extends Component
{
    public $company_name;
    public $number_ruc;
    public $email;
    public $tradename;
    public $phone;
    public $phone_mobile;
    public $representative_name;
    public $representative_number;
    public $database_name;
    public $subdomain;
    public $plan_id = 1;
    public $loading_msg = 'Creando Base de Datos';
    public function render()
    {
        return view('livewire.landlord.customer-create');
    }

    public function save()
    {
        $this->validate([
            'company_name' => 'required',
            'number_ruc' => 'required',
            'email' => 'required',
            'tradename' => 'required',
            'phone' => 'required',
            'phone_mobile' => 'required',
            'representative_name' => 'required',
            'representative_number' => 'required',
            'database_name' => 'required',
            'subdomain' => 'required'
        ]);

        $new_domain = $this->subdomain . '.' . env('CENTRAR_DOMAIN', 'delmapp.test');

        $tenant = Tenant::create([
            'plan' => $this->plan_id,
            'id' => $this->database_name,
            'name' => $this->company_name,
            'phone' => $this->phone,
            'phone_mobile' => $this->phone_mobile,
            'representative_name' => $this->representative_name
        ]);

        $tenant->domains()->create(['domain' => $new_domain]);
        $this->loading_msg = 'Creando Dominio';
        $tenant->run(function () {
            $company = SetCompany::create([
                'name' => $this->company_name,
                'number' => $this->number_ruc,
                'email' => $this->email,
                'tradename' => $this->tradename,
                'phone' => $this->phone,
                'phone_mobile' => $this->phone_mobile,
                'representative_name' => $this->representative_name,
                'representative_number' => $this->representative_number,
                'logo' => 'company/logos/logo.jpg',
                'logo_store' => 'company/logos/logo_store.jpg',
                'main' => true
            ]);

            $establishment = SetEstablishment::create([
                'name' => 'Oficina principal',
                'address' => 'inicio de registros',
                'phone' => '12345678',
                'observation' => 'inicio de registros',
                'state' => true,
                'company_id' => $company->id,
                'country_id' => 'PE',
                'department_id' => '02',
                'province_id' => '0218',
                'district_id' => '021801',
                'email' => 'establecimiento@gmail.com'
            ]);

            InvLocation::create([
                'establishment_id' => $establishment->id,
                'name' => 'Almacen Oficina Principal',
                'state' => true
            ]);

            UserEstablishment::create([
                'user_id'           => 1,
                'establishment_id'  => $establishment->id,
                'main'              => true
            ]);

            $this->loading_msg = 'Creando Datos de Empresa';

            $storage_path = storage_path();
            if (!file_exists($storage_path)) {
                mkdir("$storage_path/framework/cache", 0777, true);
            }
        });

        $this->loading_msg = 'Creando Datos de Iniciales para el sistema';

        Artisan::call("tenants:seed --tenants=" . $tenant->id);

        return redirect()->route('landlord_customer');
    }
}
