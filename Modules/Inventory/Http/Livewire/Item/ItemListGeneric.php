<?php

namespace Modules\Inventory\Http\Livewire\Item;

use Elibyy\TCPDF\TCPDF;
use Livewire\Component;
use Modules\Inventory\Entities\InvItem;
use Modules\Inventory\Imports\ItemsImportGeneric;
use Elrod\UserActivity\Activity;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Modules\Inventory\Entities\InvItemPrice;
use Modules\Inventory\Entities\InvUnitMeasure;
use PDF;

class ItemListGeneric extends Component
{
    public $show;
    public $search;
    public $file_excel;
    public $loading_import = false;
    public $item_name_modal;
    public $unit_measures = [];
    public $measure_id;
    public $description;
    public $quantity;
    public $price;
    public $main;
    public $xitem;
    public $xprices = [];
    public $item_ids = [];

    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->show = 10;
        $this->unit_measures = InvUnitMeasure::all();
    }

    public function render()
    {
        return view('inventory::livewire.item.item-list-generic', ['items' => $this->getItems()]);
    }

    public function itemSearch()
    {
        $this->resetPage();
    }
    public function getItems()
    {
        return InvItem::where('inv_items.name', 'like', '%' . $this->search . '%')
            ->leftJoin('inv_categories', 'inv_items.category_id', 'inv_categories.id')
            ->leftJoin('inv_brands', 'brand_id', 'inv_brands.id')
            ->leftJoin('inv_unit_measures', 'unit_measure_id', 'inv_unit_measures.id')
            ->select(
                'inv_items.internal_id',
                'inv_items.id',
                'inv_items.name',
                'inv_items.description',
                'inv_items.purchase_price',
                'inv_items.sale_price',
                'inv_items.stock',
                'inv_items.stock_min',
                'inv_items.status',
                'inv_categories.description AS name_category',
                'inv_brands.description AS name_brand',
                'inv_unit_measures.name AS unit_measure',
                'inv_unit_measures.abbreviation AS unit_measure_abr'
            )
            ->paginate($this->show);
    }

    public function deleteItem($id)
    {
        try {
            $item = InvItem::find($id);

            $activity = new activity;
            $activity->log('Se eliminó el item');
            $activity->modelOn(InvItem::class, $id, 'inv_item');
            $activity->dataOld($item);
            $activity->logType('delete');
            $activity->causedBy(Auth::user());
            $activity->save();

            $item->delete();
            $res = 'success';
        } catch (\Illuminate\Database\QueryException $e) {
            $res = 'error';
        }
        $this->dispatchBrowserEvent('set-item-delete', ['res' => $res]);
    }

    public function import()
    {
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', '400');
        try {
            if ($this->file_excel) {

                if (Excel::import(new ItemsImportGeneric, $this->file_excel)) {
                    $this->loading_import = true;
                } else {
                    $this->loading_import = false;
                }
            }
        } catch (Exception $e) {
            $this->loading_import = false;
            dd($e->getMessage());
        }
    }

    public function openModalItemPrices($id)
    {
        $this->xitem = InvItem::find($id);
        $this->getItemPrices($id);
        $this->item_name_modal = $this->xitem->name;

        $this->dispatchBrowserEvent('set-item-price-modal', ['res' => true]);
    }

    public function getItemPrices($id)
    {
        $this->xprices = InvItemPrice::join('inv_unit_measures', 'measure_id', 'inv_unit_measures.id')
            ->select(
                'inv_item_prices.id',
                'inv_unit_measures.name',
                'inv_item_prices.description',
                'inv_item_prices.units',
                'inv_item_prices.price',
                'inv_item_prices.main'
            )
            ->where('item_id', $id)->get();
    }
    public function saveItemPrice()
    {
        $this->validate([
            'measure_id' => 'required',
            'description' => 'required|max:300',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        InvItemPrice::create([
            'item_id' => $this->xitem->id,
            'measure_id' => $this->measure_id,
            'description' => $this->description,
            'units' => $this->quantity,
            'price' => $this->price,
            'main' => ($this->main ? true : false)
        ]);

        $this->measure_id =  null;
        $this->description = null;
        $this->quantity = null;
        $this->price = null;
        $this->main = false;

        $this->getItemPrices($this->xitem->id);

        $this->dispatchBrowserEvent('set-item-price-save', ['res' => true]);
    }
    public function deleteItemPrice($id)
    {
        try {
            $item = InvItemPrice::find($id);

            $activity = new activity;
            $activity->log('Se eliminó el precio');
            $activity->modelOn(InvItemPrice::class, $id, 'inv_item_prices');
            $activity->dataOld($item);
            $activity->logType('delete');
            $activity->causedBy(Auth::user());
            $activity->save();

            $item->delete();
            $res = 'success';
        } catch (\Illuminate\Database\QueryException $e) {
            $res = 'error';
        }
        $this->getItemPrices($this->xitem->id);
        $this->dispatchBrowserEvent('set-item-price-delete', ['res' => $res]);
    }

    public function printLabels()
    {

        $itms_prints = [];


        $filename = 'tickets.pdf';
        $medidas = array(72, 25); // Ajustar aqui segun los milimetros necesarios;
        $pdf = new TCPDF('P', 'mm', $medidas, true, 'UTF-8', false);
        $pdf->SetTitle('Hello World');

        $pdf->setBarcode(date('Y-m-d H:i:s'));

        // set font
        $pdf->SetFont('helvetica', '', 10);

        $style = array(
            'border' => false,
            'padding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false,
            'fontsize' => 12,
        );

        $i = 0;

        foreach ($this->item_ids as $k) {
            $itms_print = InvItem::select(
                'internal_id',
                'sale_price',
                'size'
            )
                ->where('id', $k)
                ->first();
            $itms_prints[$i] = [
                'internal_id' => $itms_print->internal_id,
                'size' => $itms_print->size,
                'sale_price' => $itms_print->sale_price
            ];

            $pdf->AddPage();

            $pdf->MultiCell(35, 0, 'P: ' . $itms_print->sale_price, 0, 'L', false, 1, 10, 0, false, 0, false, false, 0, 'T', false);
            //$pdf->write1DBarcode($itms_print->internal_id . intval($itms_print->size), 'C128A', 0, 5, 35, 20, 0.4, $style, 'N');
            $pdf->write2DBarcode($itms_print->internal_id . intval($itms_print->size), 'QRCODE', 10, 3, 20, 20, $style, 'N');

            $pdf->MultiCell(35, 0, 'P: ' . $itms_print->sale_price, 0, 'L', false, 1, 45, 0, false, 0, false, false, 0, 'T', false);
            //$pdf->write1DBarcode($itms_print->internal_id . intval($itms_print->size), 'C128A', 38, 5, 35, 20, 0.4, $style, 'N');
            $pdf->write2DBarcode($itms_print->internal_id . intval($itms_print->size), 'QRCODE', 45, 3, 20, 20, $style, 'N');

            $pdf->Ln();
            // $i = $i + 20;
            $i++;
        }
        //$pdf->writeHTML(view('inventory::item.print_tickets')->with('itms_prints', $itms_prints)->render());

        $pdf->Output(public_path($filename), 'F');

        return response()->download(public_path($filename));

        //$this->dispatchBrowserEvent('set-item-print-labels', ['success' => true]);
    }
}
