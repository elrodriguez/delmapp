<?php

namespace Modules\Restaurant\Http\Livewire\Floors;

use Illuminate\Support\Facades\Lang;
use Livewire\Component;
use Modules\Restaurant\Entities\RestFloor;
use Modules\Setting\Entities\SetEstablishment;

class FloorsEdit extends Component
{
    public $establishments = [];

    public $description;
    public $establishment_id;
    public $state = true;
    public $floor;

    public function mount($floor_id)
    {
        $this->floor = RestFloor::find($floor_id);
        $this->establishments = SetEstablishment::all();

        $this->description = $this->floor->name;
        $this->establishment_id = $this->floor->establishment_id;
        $this->state = $this->floor->state;
    }

    public function render()
    {
        return view('restaurant::livewire.floors.floors-edit');
    }

    public function update()
    {

        $this->validate([
            'description' => 'required',
            'establishment_id' => 'required'
        ]);

        $this->floor->update([
            'establishment_id' => $this->establishment_id,
            'name' => $this->description,
            'state' => $this->state ? true : false
        ]);

        $this->dispatchBrowserEvent('set-floors-save', ['msg' => Lang::get('labels.successfully_registered')]);
    }
}
