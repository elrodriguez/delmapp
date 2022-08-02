<?php

namespace Modules\Restaurant\Http\Livewire\Attend;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Restaurant\Entities\RestOrder;

class Deliveries extends Component
{
    public $show;
    public $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('restaurant::livewire.attend.deliveries', ['deliveries' => $this->getDeliveriess()]);
    }
    public function deliveriesSearch()
    {
        $this->resetPage();
    }

    public function getDeliveriess()
    {
        return RestOrder::where('customer_person_name', 'like', '%' . $this->search . '%')
            ->where('order_type', 'D')
            ->paginate($this->show);
    }

    public function deleteBrand($id)
    {
        try {
            RestOrder::find($id)->delete();
            $res = 'success';
        } catch (\Illuminate\Database\QueryException $e) {
            $res = 'error';
        }
        $this->dispatchBrowserEvent('set-brand-delete', ['res' => $res]);
    }
}
