<?php

namespace Modules\Sales\Http\Controllers;

use App\CoreBilling\Billing;
use App\Models\Person;
use App\Models\UserEstablishment;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Inventory\Entities\InvLocation;
use Modules\Setting\Entities\SetEstablishment;
use App\CoreBilling\Helpers\Number\NumberLetter as NumberNumberLetter;
use App\Models\AffectationIgvType;
use App\Models\Parameter;
use Carbon\Carbon;
use Elrod\UserActivity\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Modules\Inventory\Entities\InvAsset;
use Modules\Inventory\Entities\InvItem;
use Modules\Inventory\Entities\InvItemPrice;
use Modules\Inventory\Entities\InvKardex;
use Modules\Sales\Entities\SalDocumentAll;
use Modules\Sales\Entities\SalSaleNote;
use Modules\Sales\Entities\SalSaleNoteItem;
use Modules\Sales\Entities\SalSerie;
use Modules\Setting\Entities\SetCompany;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public $document_type_id = '80';
    public $identity_document_types = [];
    public $series;
    public $f_issuance;
    public $f_expiration;
    public $serie_id;
    public $correlative;
    public $customer_id;
    public $item_id;
    public $box_items = [];
    public $total;
    public $payment_method_types = [];
    public $cat_payment_method_types;
    public $cat_expense_method_types;
    public $external_id;
    public $value_icbper;
    public $additional_information;
    public $igv;

    public $total_exportation = 0;
    public $total_taxed;
    public $total_exonerated;
    public $total_unaffected;
    public $total_free;
    public $total_igv;
    public $total_value;
    public $total_taxes;
    public $total_plastic_bag_taxes;
    public $total_prepayment = 0;
    public $currencyTypeIdActive = 'PEN';
    public $exchangeRateSale = 0;
    public $total_discount = 0;
    public $total_isc = 0;
    public $warehouse_id;
    public $establishment_id;
    public $establishments = [];

    public $identity_document_type_id = 1;
    public $sex;
    public $number_id;
    public $name;
    public $last_paternal;
    public $last_maternal;
    public $trade_name;
    public $xgenerico;
    public $department_id;
    public $province_id;
    public $district_id;
    public $countries = [];
    public $departments = [];
    public $provinces = [];
    public $districts = [];
    public $soap_type_id;
    public $stock_notes;
    public $produc_price_id = null;
    public $produc_price = null;
    public $produc_price_units = null;
    public $produc_price_description = null;
    public $produc_image = null;

    public function index()
    {
        return view('sales::index');
    }

    public function establishments()
    {

        $establishments = UserEstablishment::join('set_establishments', 'establishment_id', 'set_establishments.id')
            ->select(
                'set_establishments.id',
                'set_establishments.name',
                'user_establishments.main'
            )
            ->where('user_establishments.user_id', Auth::id())
            ->get();
        if (count($establishments) > 0) {
            return response()->json($establishments->toArray(), 200);
        } else {
            return response()->json([], 200);
        }
    }

    public function saleValidate(Request $request)
    {

        $items = $request->input('items');
        $this->establishment_id = $request->input('establishment_id');
        $this->warehouse_id = InvLocation::where('establishment_id', $this->establishment_id)->where('state', true)->first()->id;
        $this->soap_type_id = SetCompany::where('main', true)->first()->soap_type_id;
        $this->value_icbper = Parameter::where('id_parameter', 'PRT006ICP')->value('value_default');
        $this->igv = (int) Parameter::where('id_parameter', 'PRT002IGV')->value('value_default');

        foreach ($items as $item) {
            $this->produc_price = $item['presentation']['price'];
            if ($item['presentation']['id']) {
                $this->produc_price_id = $item['presentation']['id'];
                $this->produc_price_units = $item['presentation']['units'];
                $this->produc_price_description = $item['presentation']['description'];
            }
            $this->addItems($item['id'], $item['presentation']['quantity']);
        }


        $total_amount = 0;

        // if ($this->payment_method_types > 0) {
        //     foreach ($this->payment_method_types as $key => $val) {
        //         $total_amount = $total_amount + $val['amount'];
        //     }
        // }

        // if($this->total == $total_amount){
        $this->storeSale();
        // }else{
        //     $this->dispatchBrowserEvent('response_payment_total_different', ['message' => Lang::get('labels.msg_totaldtc')]);
        // }

    }

    public function storeSale()
    {

        $establishment_json = SetEstablishment::where('id', $this->establishment_id)->first();
        $this->recalculateAll();

        $this->getSerieCorrelative();
        $this->xgenerico = Person::where('trade_name', 'like', '%Clientes Varios%')
            ->where('identity_document_type_id', 0)
            ->first();
        if ($this->xgenerico) {
            $customer_json = $this->xgenerico;
            $this->customer_id = $this->xgenerico->id;
        }

        $date = date('Y-m-d');
        // list($di, $mi, $yi) = explode('/', $date);
        // list($de, $me, $ye) = explode('/', $date);
        // $date_of_issue = $yi . '-' . $mi . '-' . $di;
        $date_of_issue = $date;
        //$date_of_due = $ye.'-'.$me.'-'.$de;

        $numberletters = new NumberNumberLetter();

        $legends = array('code' => 1000, 'value' => $numberletters->convertToLetter($this->total));

        $this->external_id = Str::uuid()->toString();
        $this->total_taxes = $this->total_igv;
        $paid = 0;
        foreach ($this->payment_method_types as $key => $value) {
            $paid = $paid + $value['amount'];
        }

        $sale_note = SalSaleNote::create([
            'user_id' => Auth::id(),
            'external_id' => $this->external_id,
            'establishment_id' => $this->establishment_id,
            'establishment' => $establishment_json,
            'soap_type_id' => $this->soap_type_id,
            'state_type_id' => '01',
            'prefix' => 'NV',
            'series' => $this->serie_id,
            'number' => $this->correlative,
            'date_of_issue' => $date_of_issue,
            'time_of_issue' => Carbon::now()->toDateTimeString(),
            'customer_id' => $this->customer_id,
            'customer' => $customer_json,
            'currency_type_id' => $this->currencyTypeIdActive,
            'exchange_rate_sale' => $this->exchangeRateSale,
            'total_prepayment' => 0,
            'total_charge' => 0,
            'total_discount' => $this->total_discount,
            'total_exportation' => $this->total_exportation,
            'total_free' => $this->total_free,
            'total_taxed' => $this->total_taxed,
            'total_unaffected' => $this->total_unaffected,
            'total_exonerated' => $this->total_exonerated,
            'total_igv' => $this->total_igv,
            'total_base_isc' => 0,
            'total_isc' => $this->total_isc,
            'total_base_other_taxes' => 0,
            'total_other_taxes' => 0,
            'total_taxes' => $this->total_taxes,
            'total_value' => $this->total_taxed,
            'total' => $this->total,
            'legends' => $legends,
            'total_canceled' => true,
            'paid' => ($paid == $this->total ? true : false),
            'observation' => $this->additional_information
        ]);

        foreach ($this->box_items as $row) {

            SalSaleNoteItem::create([
                'sale_note_id' => $sale_note->id,
                'item_id' => $row['item_id'],
                'item' => $row['item'],
                'quantity' => $row['quantity'],
                'unit_value' => $row['unit_value'],
                'affectation_igv_type_id' => $row['affectation_igv_type_id'],
                'total_base_igv' => $row['total_base_igv'],
                'percentage_igv' => $row['percentage_igv'],
                'total_igv' => $row['total_igv'],
                'system_isc_type_id' => $row['system_isc_type_id'],
                'total_base_isc' => $row['total_base_isc'],
                'percentage_isc' => $row['percentage_isc'],
                'total_isc' => $row['total_isc'],
                'total_base_other_taxes' => $row['total_base_other_taxes'],
                'percentage_other_taxes' => $row['percentage_other_taxes'],
                'total_other_taxes' => $row['total_other_taxes'],
                'total_taxes' => $row['total_taxes'],
                'price_type_id' => $row['price_type_id'],
                'unit_price' => $row['unit_price'],
                'total_value' => $row['total_value'],
                'total_charge' => $row['total_charge'],
                'total_discount' => $row['total_discount'],
                'total' => $row['total']
            ]);

            if ($this->stock_notes) {
                InvAsset::where('item_id', $row['item_id'])
                    ->where('location_id', $this->warehouse_id)
                    ->decrement('stock', $row['quantity']);
                InvItem::where('id', $row['item_id'])->decrement('stock', $row['quantity']);
                InvKardex::create([
                    'date_of_issue' => Carbon::now()->format('Y-m-d'),
                    'establishment_id' => $sale_note->establishment_id,
                    'item_id' => $row['item_id'],
                    'kardexable_id' => $sale_note->id,
                    'kardexable_type' => SalSaleNote::class,
                    'location_id' => $this->warehouse_id,
                    'quantity' => (-$row['quantity']),
                    'detail' => 'Venta'
                ]);
            }
        }
        $billing = new Billing();
        $billing->saveCashDocument($sale_note->id, 'sale_note');

        //$this->savePayments($sale_note);

        SalSerie::where('id', $this->serie_id)->increment('correlative');

        SalDocumentAll::create([
            'document_id' => $sale_note->id,
            'entity_name' => SalSaleNote::class
        ]);

        $user = Auth::user();
        $activity = new Activity;
        $activity->modelOn(SalSaleNote::class, $sale_note->id);
        $activity->causedBy($user);
        $activity->dataOld($sale_note);
        $activity->logType('create');
        $activity->log('Registro nueva nota de venta');
        $activity->save();

        return response()->json(array('msg' => Lang::get('successfully_registered')), 200);
    }
    public function getSerieCorrelative()
    {
        $serie = SalSerie::where('document_type_id', '80')
            ->where('establishment_id', $this->establishment_id)
            ->first();

        if ($serie) {
            $this->serie_id = $serie->id;
            $this->correlative = str_pad($serie->correlative, 8, "0", STR_PAD_LEFT);
        } else {
            $this->correlative = str_pad(0, 8, "0", STR_PAD_LEFT);
        }
    }
    public function recalculateAll()
    {
        if (count($this->box_items) > 0) {

            foreach ($this->box_items as $key => $item) {
                $data[$key] = $this->calculateRowItem($item);
            }
            $this->box_items = $data;
            $this->calculateTotal();
        }
    }
    function calculateRowItem($data)
    {

        $percentage_igv = $this->igv;
        $unit_value = $data['unit_price'];

        if ($data['affectation_igv_type_id'] === '10') {
            $unit_value = $data['unit_price'] / (1 + $percentage_igv / 100);
        }


        $data['unit_value'] = $unit_value;

        $quantity = 0;

        if ($data['quantity']) {
            $quantity = $data['quantity'];
        } else {
            $quantity = 0;
        }
        $total_value_partial = $unit_value * $quantity;

        $total_isc = 0;
        $total_other_taxes = 0;
        $discount_base = 0;
        $total_discount = 0;
        $total_charge = 0;
        $total_value = $total_value_partial - $total_discount + $total_charge;
        $total_base_igv = $total_value_partial - $discount_base + $total_isc;

        $total_igv = 0;

        if ($data['affectation_igv_type_id'] === '10') {
            $total_igv = $total_base_igv * $percentage_igv / 100;
        }
        if ($data['affectation_igv_type_id'] === '20') { //Exonerated
            $total_igv = 0;
        }
        if ($data['affectation_igv_type_id'] === '30') { //Unaffected
            $total_igv = 0;
        }

        $total_taxes = $total_igv + $total_isc + $total_other_taxes;
        $total = $total_value + $total_taxes;

        $data['total_charge'] = number_format($total_charge, 2, '.', '');
        $data['total_discount'] = number_format($total_discount, 2, '.', '');
        $data['total_value'] = number_format($total_value, 2, '.', '');
        $data['total_base_igv'] = number_format($total_base_igv, 2, '.', '');
        $data['total_igv'] =  number_format($total_igv, 2, '.', '');
        $data['total_taxes'] = number_format($total_taxes, 2, '.', '');
        $data['total'] = number_format($total, 2, '.', '');

        if (json_decode($data['affectation_igv_type'])->free) {
            $data['price_type_id'] = '02';
            $data['unit_value'] = 0;
            $data['total'] = 0;
        }

        //impuesto bolsa
        if (json_decode($data['item'])->has_plastic_bag_taxes) {
            $data['total_plastic_bag_taxes'] = number_format($quantity * $this->value_icbper, 2, '.', '');
        }

        return $data;
    }

    public function calculateTotal()
    {
        $total_discount = 0;
        $total_charge = 0;
        $total_exportation = 0;
        $total_taxed = 0;
        $total_taxes = 0;
        $total_exonerated = 0;
        $total_unaffected = 0;
        $total_free = 0;
        $total_igv = 0;
        $total_value = 0;
        $total = 0;
        $total_plastic_bag_taxes = 0;
        $onerosas = array('10', '20', '30', '40');

        foreach ($this->box_items as $key => $value) {
            $total_discount = $total_discount + 0;
            $total_charge = $total_charge + 0;
            $affectation_igv = (string) $value['affectation_igv_type_id'];

            if ($affectation_igv === '10') {
                $total_taxed = $total_taxed + $value['total_value'];
            }
            if ($affectation_igv === '20') {
                $total_exonerated = $total_exonerated + $value['total_value'];
            }
            if ($affectation_igv === '30') {
                $total_unaffected = $total_unaffected + $value['total_value'];
            }
            if ($affectation_igv === '40') {
                $total_exportation = $total_exportation + $value['total_value'];
            }
            if (array_search($affectation_igv, $onerosas) < 0) {
                $total_free = $total_free + $value['total_value'];
            }
            if (array_search($affectation_igv, $onerosas) > -1) {
                $total_igv = $total_igv + $value['total_igv'];
                $total = $total + $value['total'];
            }

            $total_value = $total_value + $value['total_value'];
            $total_plastic_bag_taxes = $total_plastic_bag_taxes + $value['total_plastic_bag_taxes'];

            if (in_array($affectation_igv, array('13', '14', '15'))) {

                $unit_value = ($value['total_value'] / $value['quantity']) / (1 + $value['percentage_igv'] / 100);
                $total_value_partial = $unit_value * $value['quantity'];
                //$total_taxes = $value['total_value'] - $total_value_partial;
                $total_taxes = $total_igv;
                $this->box_items[$key]['total_igv'] = $value['total_value'] - $total_value_partial;
                $this->box_items[$key]['total_base_igv'] = $total_value_partial;
                $total_value = $total_value - $value['total_value'];
            }
        }

        $this->total_exportation = number_format($total_exportation, 2, '.', '');
        $this->total_taxed = number_format($total_taxed, 2, '.', '');
        $this->total_exonerated = number_format($total_exonerated, 2, '.', '');
        $this->total_unaffected = number_format($total_unaffected, 2, '.', '');
        $this->total_free = number_format($total_free, 2, '.', '');
        $this->total_igv = number_format($total_igv, 2, '.', '');
        $this->total_value = number_format($total_value, 2, '.', '');
        $this->total_taxes = number_format($total_taxes, 2, '.', '');
        $this->total_plastic_bag_taxes = number_format($total_plastic_bag_taxes, 2, '.', '');

        $this->total = number_format($total + $total_plastic_bag_taxes, 2, '.', '');

        // if(this.enabled_discount_global)
        //     this.discountGlobal()

        // if(this.prepayment_deduction)
        //     this.discountGlobalPrepayment()

        // if(['1001', '1004'].includes(this.form.operation_type_id))
        //     this.changeDetractionType()

        // this.setTotalDefaultPayment()
        // this.setPendingAmount()

        // this.calculateFee();
    }
    public function addItems($id, $produc_quantity)
    {

        // $exists_stock = InvKardex::where('item_id', $id)
        //     ->where('location_id', $this->warehouse_id)
        //     ->sum('quantity');

        $success = true;
        $showmsg = false;
        $msg = '';


        $item = InvItem::where('id', $id)->first()->toArray();

        // if ($exists_stock <= $item['stock_min']) {

        //     $showmsg = true;
        //     $success = true;
        //     $msg = Lang::get('labels.msg_product_about_out');
        // }

        // if ($exists_stock <= 0) {
        //     $success = false;
        //     $showmsg = true;
        //     $msg = Lang::get('labels.msg_product_no_units');
        // }

        if ($success) {
            //$unit_price = $item['sale_price'];
            $unit_price = $this->produc_price;
            $currencyTypeIdActive = 'PEN';
            $exchangeRateSale = 0.01;
            //$currency_type_id_old = $item['currency_type_id'];
            $currency_type_id_old = 'PEN';

            if ($currency_type_id_old === 'PEN' && $currency_type_id_old !== $currencyTypeIdActive) {
                $unit_price = $unit_price / $exchangeRateSale;
            }

            if ($currencyTypeIdActive === 'PEN' && $currency_type_id_old !== $currencyTypeIdActive) {
                $unit_price = $unit_price * $exchangeRateSale;
            }

            $affectation_igv_type = AffectationIgvType::where('id', $item['sale_affectation_igv_type_id'])->first()->toArray();
            $item['name'] = $item['name'] . ' ' . $this->produc_price_description;

            $presentation = array('presentation' => []);

            if ($this->produc_price_id) {
                $presentation['presentation'] = InvItemPrice::find($this->produc_price_id)->toArray();
            }

            $item = array_merge($item, $presentation);

            $data = [
                'item_id' => $item['id'],
                'item' => json_encode($item),
                'currency_type_id' => $item['currency_type_id'],
                'quantity' => $produc_quantity,
                'unit_value' => 0,
                'affectation_igv_type_id' => $item['sale_affectation_igv_type_id'],
                'affectation_igv_type' => json_encode($affectation_igv_type),
                'total_base_igv' => 0,
                'percentage_igv' => $this->igv,
                'total_igv' => 0,
                'system_isc_type_id' => null,
                'total_base_isc' => 0,
                'percentage_isc' => 0,
                'total_isc' => 0,
                'total_base_other_taxes' => 0,
                'percentage_other_taxes' => 0,
                'total_other_taxes' => 0,
                'total_plastic_bag_taxes' => 0,
                'total_taxes' => 0,
                'price_type_id' => '01',
                'unit_price' => $unit_price,
                'input_unit_price_value' => $this->produc_price,
                'total_value' => 0,
                'total_discount' => 0,
                'total_charge' => 0,
                'total' => 0
            ];

            $data = $this->calculateRowItem($data, $currencyTypeIdActive, $exchangeRateSale);

            array_push($this->box_items, $data);

            $this->payment_method_types[0] = [
                'method' => '01',
                'destination' => 'cash',
                'date_of_payment' => Carbon::now()->format('d/m/Y'),
                'reference' => null,
                'amount' => $this->total
            ];

            $this->produc_price_id = null;
            $this->produc_price = null;
            $this->produc_price_units = null;
            $this->produc_price_description = null;
            $this->produc_image = null;
        }
    }
}
