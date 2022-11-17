<?php

namespace Modules\Restaurant\Http\Livewire\Commands;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Livewire\Component;
use Modules\Restaurant\Entities\RestCategoryCommand;
use Modules\Restaurant\Entities\RestComCatDetail;
use Modules\Restaurant\Entities\RestCommand;
use Modules\Restaurant\Entities\RestKardex;
use Modules\Restaurant\Entities\RestPreparationOrders;

class CommandsAddStocks extends Component
{

    public $category_id_old = [];
    public $category_id_new;
    public $categories = [];
    public $price;
    public $stock;
    public $internal_id;
    public $description;
    public $amount_to_enter;
    public $command_id;
    public $description_stock;

    public function mount($command_id)
    {
        $this->command_id = $command_id;

        $this->categories = $this->getCategories();

        $this->command = RestCommand::find($command_id);

        $restComCatDetails = RestComCatDetail::where('command_id', $command_id)->get();

        if (count($restComCatDetails) > 0) {
            foreach ($restComCatDetails as $k => $restComCatDetail) {
                $this->category_id_old[$k] = $restComCatDetail->category_id;
            }
        }

        $this->description = $this->command->description;

        $this->price = $this->command->price;
        $this->stock = $this->command->stock;
        $this->internal_id = $this->command->internal_id;
    }

    public function render()
    {
        return view('restaurant::livewire.commands.commands-add-stocks');
    }

    public function getCategories()
    {
        $categories = RestCategoryCommand::whereNull('category_id')
            ->get();

        $data = [];

        foreach ($categories as $k => $category) {
            $data[$k] = array(
                'id'            => $category->id,
                'title'         => $category->description,
                //'isSelectable'  => false,
                'subs'          => $this->getSubCategories($category->id)
            );
        }
        return $data;
    }

    public function getSubCategories($id)
    {
        $subcategories = RestCategoryCommand::where('category_id', $id)
            ->get();

        $data = [];

        if (count($subcategories) > 0) {
            foreach ($subcategories as $k => $category) {
                $data[$k] = array(
                    'id'            => $category->id,
                    'title'         => $category->description,
                    //'isSelectable'  => false,
                    'subs'          => $this->getSubCategories($category->id)
                );
            }
        }

        return $data;
    }

    public function saveStock()
    {
        $this->validate(['amount_to_enter' => 'required|numeric']);

        if ($this->description_stock == null) {
            $this->description_stock = 'Ingreso desde cocina';
        }
        $enter = RestPreparationOrders::create([
            'command_id' => $this->command_id,
            'responsable_id' => Auth::user()->person_id,
            'quantity' => $this->amount_to_enter,
            'description' => $this->description_stock
        ]);

        RestKardex::create([
            'command_id' => $this->command_id,
            'quantity' => $this->amount_to_enter,
            'movement_type_id' => $enter->id,
            'state' => true,
            'description' => $this->description_stock,
            'movement_type_entity' => RestPreparationOrders::class
        ]);

        $this->command->decrement('stock', $this->amount_to_enter);

        $this->amount_to_enter = null;

        $this->dispatchBrowserEvent('set-command-stock-save', ['msg' => Lang::get('labels.successfully_registered')]);

    }

    public function back(){
        redirect()->route('restaurant_commands_list');
    }
}
