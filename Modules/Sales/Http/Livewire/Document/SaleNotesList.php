<?php

namespace Modules\Sales\Http\Livewire\Document;

use App\Models\Parameter;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Setting\Entities\SetEstablishment;
use Elrod\UserActivity\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Modules\Inventory\Entities\InvAsset;
use Modules\Inventory\Entities\InvItem;
use Modules\Inventory\Entities\InvKardex;
use Modules\Inventory\Entities\InvLocation;
use Modules\Restaurant\Entities\RestSaleNote;
use Modules\Sales\Entities\SalSaleNote;

class SaleNotesList extends Component
{
    public $show;
    public $search;
    public $stock_notes;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshlistSaleNotes' => 'searchSaleNote'];

    public function mount()
    {
        $this->show = 10;
        $this->stock_notes = (bool) Parameter::where('id_parameter', 'PRT008DSN')->value('value_default');
    }

    public function render()
    {
        return view('sales::livewire.document.sale-notes-list', ['notes' => $this->getData()]);
    }

    public function searchSaleNote()
    {
        $this->resetPage();
    }


    public function getData()
    {

        $sales_notes_sales = SalSaleNote::join('state_types', 'state_type_id', 'state_types.id')
            ->leftJoin('sal_documents', 'document_id', 'sal_documents.id')
            ->select(
                'sal_sale_notes.id',
                'sal_sale_notes.external_id',
                'sal_sale_notes.date_of_issue',
                'sal_sale_notes.series',
                'sal_sale_notes.number as number',
                'sal_sale_notes.customer',
                'sal_sale_notes.state_type_id',
                'state_types.description',
                'sal_sale_notes.total',
                'sal_sale_notes.paid',
                DB::raw('CONCAT(sal_documents.series,"-",sal_documents.number) AS voucher')
            );


        $sales_notes_restaurants = RestSaleNote::join('state_types', 'state_type_id', 'state_types.id')
            ->leftJoin('sal_documents', 'document_id', 'sal_documents.id')
            ->select(
                'rest_sale_notes.id',
                'rest_sale_notes.external_id',
                'rest_sale_notes.date_of_issue',
                'rest_sale_notes.series',
                'rest_sale_notes.number as number',
                'rest_sale_notes.customer',
                'rest_sale_notes.state_type_id',
                'state_types.description',
                'rest_sale_notes.total',
                'rest_sale_notes.paid',
                DB::raw('CONCAT(sal_documents.series,"-",sal_documents.number) AS voucher')
            );

        return $sales_notes_sales->union($sales_notes_restaurants)->orderBy('number', 'DESC')->paginate();
    }

    public function cancelDocument($id)
    {
        $note = SalSaleNote::find($id);
        $items = $note->items;
        $warehouse_id = InvLocation::where('establishment_id', $note->establishment_id)->first()->id;

        foreach ($items as $item) {
            if ($this->stock_notes) {
                InvAsset::where('item_id', $item->item_id)
                    ->where('location_id', $warehouse_id)
                    ->increment('stock', $item->quantity);
                InvItem::where('id', $item->item_id)->increment('stock', $item->quantity);
                InvKardex::create([
                    'date_of_issue' => Carbon::now()->format('Y-m-d'),
                    'establishment_id' => $note->establishment_id,
                    'item_id' => $item->item_id,
                    'kardexable_id' => $note->id,
                    'kardexable_type' => SalSaleNote::class,
                    'location_id' => $warehouse_id,
                    'quantity' => $item->quantity,
                    'detail' => 'Anulación de Venta'
                ]);
            }
        }

        $note->update([
            'state_type_id' => '11'
        ]);

        $this->dispatchBrowserEvent('response_anulation_sale_note', ['message' => Lang::get('labels.document_canceled_correctly')]);
    }
}
