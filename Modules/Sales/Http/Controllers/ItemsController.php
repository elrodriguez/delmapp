<?php

namespace Modules\Sales\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Inventory\Entities\InvItem;
use Modules\Inventory\Entities\InvItemFile;
use Modules\Inventory\Entities\InvItemPrice;
use Modules\Inventory\Entities\InvLocation;

class ItemsController extends Controller
{
    public function searchItems(Request $request)
    {
        $establishment_id = $request->input('est');
        $search = $request->input('qry');

        $warehouse_id = InvLocation::where('establishment_id', $establishment_id)->value('id');

        $items = InvItem::leftJoin('inv_brands', 'inv_items.brand_id', 'inv_brands.id')
            ->leftJoin('inv_assets', 'inv_assets.item_id', 'inv_items.id')
            ->select(
                'inv_items.id',
                'inv_assets.patrimonial_code',
                'inv_items.name',
                'inv_brands.description',
                'inv_items.has_plastic_bag_taxes',
                'inv_items.sale_price',
                'inv_items.currency_type_id',
                'inv_items.sale_affectation_igv_type_id',
                'inv_items.item_type_id',
                'inv_items.stock_min',
                'inv_items.has_igv'

            )
            ->selectSub(function ($query) {
                $query->from('inv_kardexes')->selectRaw('SUM(quantity)')
                    ->whereColumn('inv_kardexes.item_id', 'inv_items.id')
                    ->whereColumn('inv_kardexes.location_id', 'inv_assets.location_id');
            }, 'stock')
            ->where('inv_assets.location_id', $warehouse_id)
            ->where(function ($query) use ($search) {
                $query->where('inv_assets.patrimonial_code', '=', $search)
                    ->orWhere(DB::raw("REPLACE(inv_items.name, ' ', '')"), 'like', "%" . str_replace(' ', '', $search) . "%");
            })
            ->orderBy('inv_items.name')
            ->limit(100)
            ->get();

        $data = [];
        $value_icbper = Parameter::where('id_parameter', 'PRT006ICP')->value('value_default');
        $igv = (int) Parameter::where('id_parameter', 'PRT002IGV')->value('value_default');
        if (count($items) > 0) {
            foreach ($items as $k => $item) {
                $data[$k] = [
                    'value' => $item->id,
                    'text' => ($item->patrimonial_code ? $item->patrimonial_code . ' - ' : '') . $item->name .
                        ($item->description ? ' - Marca: ' . $item->description : '') .
                        ($item->sale_price ? ' - Precio: ' . $item->sale_price : '') .
                        ($item->stock ? ' - Stock: ' . $item->stock : ''),
                    'icbper' => $item->has_plastic_bag_taxes,
                    'sale_price' => $item->sale_price,
                    'item_data' => [
                        'description' => ($item->patrimonial_code ? $item->patrimonial_code . ' - ' : '') . $item->name,
                        'name' => $item->name,
                        'brand' => $item->description,
                        'price' => $item->sale_price,
                        'stock' => $item->stock,
                        'currency_type_id' => $item->currency_type_id,
                        'sale_affectation_igv_type_id' => $item->sale_affectation_igv_type_id,
                        'item_type_id' => $item->item_type_id,
                        'stock_min' => $item->stock_min,
                        'has_igv' => $item->has_igv,
                        'value_icbper' => $value_icbper,
                        'igv' => $igv,
                        'image' => $this->itemFile($item->id)
                    ]
                ];
            }
        }

        return response()->json($data, 200);
    }

    public function itemFile($id)
    {
        $file = InvItemFile::where('item_id', $id)->where('main', true)->first();
        if ($file) {
            $img =  asset($file->route);
        } else {
            $img = url('logo/imagen-no-disponible.jpg');
        }
        return $img;
    }

    public function itemPrices($id)
    {
        $produc_prices = InvItemPrice::join('inv_unit_measures', 'measure_id', 'inv_unit_measures.id')
            ->select(
                'inv_item_prices.id',
                'inv_unit_measures.name',
                'inv_item_prices.description',
                'inv_item_prices.units',
                'inv_item_prices.price',
                'inv_item_prices.main'
            )
            ->where('item_id', $id)
            ->get();
        $data = [];
        if (count($produc_prices)) {
            $data = $produc_prices->toArray();
        }
        return response()->json($data, 200);
    }
}
