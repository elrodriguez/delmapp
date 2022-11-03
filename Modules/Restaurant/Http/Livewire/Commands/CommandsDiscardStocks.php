<?php

namespace Modules\Restaurant\Http\Livewire\Commands;

use Livewire\Component;
use Modules\Restaurant\Entities\RestCategoryCommand;
use Modules\Restaurant\Entities\RestComCatDetail;
use Modules\Restaurant\Entities\RestCommand;

class CommandsDiscardStocks extends Component
{

    public $category_id_old = [];
    public $category_id_new;
    public $categories = [];
    public $price;
    public $stock;
    public $internal_id;
    public $description;

    public function mount($command_id)
    {
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
        return view('restaurant::livewire.commands.commands-discard-stocks');
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
}
