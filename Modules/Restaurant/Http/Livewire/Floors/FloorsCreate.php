<?php

namespace Modules\Restaurant\Http\Livewire\Floors;

use Illuminate\Support\Facades\Lang;
use Livewire\Component;
use Modules\Restaurant\Entities\RestFloor;
use Modules\Setting\Entities\SetEstablishment;

class FloorsCreate extends Component
{
    public $establishments = [];

    public $description;
    public $establishment_id;
    public $state = true;

    public function mount()
    {
        $this->establishments = SetEstablishment::all();
    }

    public function render()
    {
        return view('restaurant::livewire.floors.floors-create');
    }

    public function save()
    {

        $this->validate([
            'description' => 'required',
            'establishment_id' => 'required'
        ]);



        RestFloor::create([
            'establishment_id' => $this->establishment_id,
            'name' => $this->description,
            'state' => $this->state ? true : false
        ]);

        $this->clearForm();
        $this->dispatchBrowserEvent('set-floors-save', ['msg' => Lang::get('labels.successfully_registered')]);
    }

    public function clearForm()
    {
        $this->establishment_id = null;
        $this->description = null;
        $this->state = true;
    }
}
