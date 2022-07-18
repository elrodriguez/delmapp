<?php

namespace Modules\Restaurant\Http\Livewire\Attend;

use App\Models\UserEstablishment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Restaurant\Entities\RestFloor;
use Modules\Restaurant\Entities\RestTable;
use Modules\Restaurant\Entities\RestTableOrder;

class AttendTables extends Component
{
    public $floors = [];
    public $floor_id;
    public $tables = [];
    public $desoccupied_tables = [];
    public $occupied_tables = [];
    public $user_establishment;

    protected $listeners = ['getTablesRefresh' => 'getTables', 'setFreeTableAlert' => 'setFreeTable'];

    public function mount()
    {
        $this->user_establishment = UserEstablishment::where('user_id', Auth::id())->where('main', true)->first();

        $this->floors = RestFloor::join('set_establishments', 'establishment_id', 'set_establishments.id')
            ->select(
                'rest_floors.id',
                DB::raw('CONCAT(set_establishments.name," / ",rest_floors.name) as name')
            )
            ->where('rest_floors.state', true)
            ->where('establishment_id', $this->user_establishment->establishment_id)
            ->get();
    }
    public function render()
    {
        $this->getTables();
        return view('restaurant::livewire.attend.attend-tables');
    }

    public function getTables()
    {
        $this->floor_id = $this->floors[0]->id;
        $this->tables = RestTable::where('floor_id', $this->floor_id)->get();
        $this->desoccupied_tables = RestTable::where([
            'floor_id' => $this->floor_id,
            'occupied' => false
        ])->get();

        foreach($this->desoccupied_tables as $des){
            $des->shared = false; //agrego columna para igualar a las mesas compartidas
        }

        $orders = RestTableOrder::where('state', true)->orderBy('order_id')->get();
        $joined_tables = [];
        $temp = null;
        $j = 0;

        foreach ($orders as $key => $order) {
            if ($temp != $order['order_id']) {
                $temp = $order['order_id'];
                $table = RestTable::where('id', $order['table_id'])->get()->first();
                $joined_tables[$j] = $table;
                $joined_tables[$j++]->shared = false;
            } else {
                $table = RestTable::where('id', $order['table_id'])->get()->first();
                $joined_tables[--$j]->name .= " - " . $table->name;
                $joined_tables[$j]->chairs += $table->chairs;
                $joined_tables[$j++]->shared = true;
            }
        }
        $this->occupied_tables = $joined_tables;

    }

    public function setFreeTable($id)
    {
        $this->dispatchBrowserEvent('restaurant-set-free-table', ['orderId' => $id]);
    }

    public function updateStateTable($id)
    {
        $tables = RestTableOrder::where('order_id', $id)->get();
        foreach ($tables as $table) {
            RestTable::find($table->table_id)->update(['occupied' => false]);
        }

        RestTableOrder::where('order_id', $id)->update([
            'state' => false
        ]);
    }
}
