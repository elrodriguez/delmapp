<?php

namespace Modules\Restaurant\Http\Livewire\Categories;

use Illuminate\Support\Facades\Lang;
use Livewire\Component;
use Modules\Inventory\Entities\InvCategory;
use Modules\Restaurant\Entities\RestCategoryCommand;
use Modules\Setting\Entities\SetModule;

class CategoriesCreate extends Component
{
    public $description;
    public $status = true;
    public $category_id;
    public $categories = [];

    public function mount()
    {
        $this->categories = $this->getCategories();
    }
    public function render()
    {
        return view('restaurant::livewire.categories.categories-create');
    }

    public function saveCategories()
    {

        $this->validate([
            'description' => 'required'
        ]);

        $category_id  = null;
        if ($this->category_id) {
            $category_id = $this->category_id[0];
        }


        RestCategoryCommand::create([
            'category_id'   => $category_id,
            'description'   => $this->description,
            'status'        => $this->status ? true : false
        ]);

        $this->clearForm();
        $this->dispatchBrowserEvent('set-category-save', ['msg' => Lang::get('labels.successfully_registered')]);
    }

    public function clearForm()
    {
        $this->category_id = null;
        $this->description = null;
        $this->status = true;
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
