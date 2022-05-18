<?php

namespace Modules\Restaurant\Http\Livewire\Tables;

use Livewire\Component;
use Modules\Restaurant\Entities\RestFloor;
use Modules\Setting\Entities\SetEstablishment;

class TablesFloorsModal extends Component
{
    public $name_floor;
    public $form_t;
    public $establishments = [];
    public $establishment_id;

    protected $listeners = ['openModalFloorForm' => 'openModalFloor'];

    public function mount($form_t)
    {
        $this->establishments = SetEstablishment::all();
        $this->form_t = $form_t;
    }

    public function render()
    {
        return view('restaurant::livewire.tables.tables-floors-modal');
    }

    public function openModalFloor()
    {
        $this->dispatchBrowserEvent('open-modal-floor-form', ['success' => true]);
    }

    public function saveFloor()
    {
        $this->validate(['name_floor' => 'required', 'establishment_id' => 'required']);

        RestFloor::create([
            'establishment_id' => $this->establishment_id,
            'name' => $this->name_floor
        ]);
        $this->establishment_id = null;
        $this->name_floor = null;
        if ($this->form_t == 1) {
            $this->emit('getFloorRefreshCreate');
        } else {
            $this->emit('getFloorRefreshEdit');
        }

        $this->dispatchBrowserEvent('close-modal-floor-form', ['success' => true]);
    }
}
