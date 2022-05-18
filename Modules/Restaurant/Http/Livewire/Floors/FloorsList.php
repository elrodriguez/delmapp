<?php

namespace Modules\Restaurant\Http\Livewire\Floors;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Restaurant\Entities\RestFloor;

class FloorsList extends Component
{
    public $show;
    public $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('restaurant::livewire.floors.floors-list', ['floors' => $this->getFloors()]);
    }
    public function floorSearch()
    {
        $this->resetPage();
    }

    public function getFloors()
    {
        return RestFloor::join('set_establishments', 'establishment_id', 'set_establishments.id')
            ->where('rest_floors.name', 'like', '%' . $this->search . '%')
            ->select(
                'set_establishments.name AS establishment_name',
                'rest_floors.id',
                'rest_floors.name',
                'rest_floors.state'
            )
            ->paginate($this->show);
    }

    public function deleteFloor($id)
    {
        try {
            RestFloor::find($id)->delete();
            $res = 'success';
        } catch (\Illuminate\Database\QueryException $e) {
            $res = 'error';
        }
        $this->dispatchBrowserEvent('set-floor-delete', ['res' => $res]);
    }
}
