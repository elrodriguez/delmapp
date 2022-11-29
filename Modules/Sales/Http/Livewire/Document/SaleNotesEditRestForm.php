<?php

namespace Modules\Sales\Http\Livewire\Document;

use App\CoreBilling\Billing;
use App\CoreBilling\Helpers\Number\NumberLetter as NumberNumberLetter;
use Livewire\Component;
use App\CoreBilling\Template;
use App\CoreBilling\Helpers\Storage\StorageDocument;
use App\Models\AffectationIgvType;
use App\Models\CatPaymentMethodType;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Department;
use App\Models\District;
use App\Models\GlobalPayment;
use App\Models\IdentityDocumentType;
use App\Models\Parameter;
use App\Models\Person;
use App\Models\Province;
use App\Models\UserEstablishment;
use Carbon\Carbon;
use Elrod\UserActivity\Activity;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Modules\Inventory\Entities\InvLocation;
use Modules\Restaurant\Entities\RestOrder;
use Modules\Restaurant\Entities\RestOrderCommand;
use Modules\Sales\Entities\SalSerie;
use Modules\Setting\Entities\SetCompany;
use Modules\Setting\Entities\SetEstablishment;
use Mpdf\Mpdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\HTMLParserMode;
use Illuminate\Support\Str;
use Modules\Inventory\Entities\InvAsset;
use Modules\Inventory\Entities\InvItem;
use Modules\Inventory\Entities\InvKardex;
use Modules\Restaurant\Entities\RestSaleNote;
use Modules\Restaurant\Entities\RestSaleNoteItem;
use Modules\Restaurant\Entities\RestSaleNotePayment;


class SaleNotesEditRestForm extends Component
{ public $order_id;
    public $order;

    use StorageDocument;

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

    public $total_exportation;
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
    public $restSaleNote;


    public function mount($external_id)
    {
        $this->restSaleNote = RestSaleNote::where('external_id', $external_id)->first();
        $order_id = $this->restSaleNote->order_note_id;
        $this->order_id = $order_id;
        $this->order = RestOrder::find($order_id);
        $this->value_icbper = Parameter::where('id_parameter', 'PRT006ICP')->value('value_default');
        $this->igv = (int) Parameter::where('id_parameter', 'PRT002IGV')->value('value_default');
        $this->stock_notes = (bool) Parameter::where('id_parameter', 'PRT008DSN')->value('value_default');

        $this->establishments = UserEstablishment::join('set_establishments', 'establishment_id', 'set_establishments.id')
            ->select(
                'set_establishments.id',
                'set_establishments.name',
                'user_establishments.main'
            )
            ->where('user_establishments.user_id', Auth::id())
            ->get();
        if ($this->establishments) {
            $this->establishment_id = UserEstablishment::where('user_establishments.user_id', Auth::id())
                ->where('main', true)
                ->value('establishment_id');
        }

        $this->warehouse_id = InvLocation::where('establishment_id', $this->establishment_id)->where('state', true)->first()->id;
        $this->changeSeries();

        $this->countries = Country::where('active', true)->get();
        $this->departments = Department::where('active', true)->get();

        $this->f_issuance = Carbon::now()->format('d/m/Y');
        $this->f_expiration = Carbon::now()->format('d/m/Y');

        $this->soap_type_id = SetCompany::where('main', true)->first()->soap_type_id;

        $activity = new Activity;
        $activity->causedBy(Auth::user());
        $activity->routeOn(route('restaurant_panels_charge_sale_note', $this->order_id));
        $activity->componentOn('restaurant::charge.charge-sale-note');
        $activity->log('ingresó a la vista nota de venta');
        $activity->save();
    }
    public function render()
    {
        $this->getSetItems();
        $this->recalculateAll();
        $this->cat_payment_method_types = CatPaymentMethodType::all();
        $billing = new Billing();
        $this->cat_expense_method_types = $billing->getPaymentDestinations();

        $this->identity_document_types = IdentityDocumentType::where('active', 1)->get();

        $this->xgenerico = Person::where('trade_name', 'like', '%Clientes Varios%')
            ->where('identity_document_type_id', 0)
            ->select('people.id AS value', DB::raw('CONCAT(people.number," - ",people.trade_name) AS text'))
            ->first();
        if ($this->xgenerico) {
            if (!$this->customer_id) {
                $this->customer_id = $this->xgenerico->value;
            }
        }
        return view('restaurant::livewire.charge.charge-sale-note');
    }

    public function changeSeries()
    {
        $this->series = SalSerie::where('document_type_id', $this->document_type_id)
            ->where('establishment_id', $this->establishment_id)
            ->get();

        $this->serie_id = $this->series->max('id');
        $this->selectCorrelative();
    }

    public function selectCorrelative()
    {
        $serie = SalSerie::where('id', $this->serie_id)->first();
        if ($serie) {
            $this->correlative = str_pad($serie->correlative, 8, "0", STR_PAD_LEFT);
        } else {
            $this->correlative = str_pad(0, 8, "0", STR_PAD_LEFT);
        }
    }

    public function recalculateAll()
    {
        if (count($this->box_items) > 0) {

            foreach ($this->box_items as $key => $item) {
                //if(is_numeric($item['quantity'])){
                $data[$key] = $this->calculateRowItem($item);
                //}
            }

            $this->box_items = $data;
            $this->calculateTotal();
            $this->payment_method_types[0]['amount'] = $this->total;
        }
    }

    public function getSetItems()
    {
        $commands = RestOrderCommand::where('order_id', $this->order_id)->get();
        $affectation_igv_type = AffectationIgvType::where('id', '10')->first()->toArray();

        $currencyTypeIdActive = 'PEN';
        $exchangeRateSale = 0.01;
        $currency_type_id_old = 'PEN';

        foreach ($commands as $k => $command) {
            $unit_price = $command->price;
            if ($currency_type_id_old === 'PEN' && $currency_type_id_old !== $currencyTypeIdActive) {
                $unit_price = $unit_price / $exchangeRateSale;
            }

            if ($currencyTypeIdActive === 'PEN' && $currency_type_id_old !== $currencyTypeIdActive) {
                $unit_price = $unit_price * $exchangeRateSale;
            }
            $data = [
                'item_id' => $command->command_id,
                'item' => json_encode($command->command_type::find($command->command_id)->toArray()),
                'item_class' => $command->command_type,
                'currency_type_id' => 'PEN',
                'quantity' => $command->quantity,
                'unit_value' => 0,
                'affectation_igv_type_id' => '10',
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
                'input_unit_price_value' => $command->price,
                'total_value' => 0,
                'total_discount' => 0,
                'total_charge' => 0,
                'total' => 0
            ];

            $this->box_items[$k] = $this->calculateRowItem($data, $currencyTypeIdActive, $exchangeRateSale);
            //dd($this->box_items[$k] );
        }
        $this->payment_method_types[0] = [
            'method' => '01',
            'destination' => 'cash',
            'date_of_payment' => Carbon::now()->format('d/m/Y'),
            'reference' => null,
            'amount' => $this->total
        ];
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
        // if (json_decode($data['item'])->has_plastic_bag_taxes) {
        //     $data['total_plastic_bag_taxes'] = number_format($quantity * $this->value_icbper, 2, '.', '');
        // }

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

    public function newPaymentMethodTypes()
    {
        $data = [
            'method' => '01',
            'destination' => 'cash',
            'date_of_payment' => Carbon::now()->format('d/m/Y'),
            'reference' => null,
            'amount' => null
        ];
        array_push($this->payment_method_types, $data);
    }

    public function removePaymentMethodTypes($key)
    {
        unset($this->payment_method_types[$key]);
    }

    public function storeClient()
    {

        $this->validate([
            'identity_document_type_id' => 'required',
            'number_id'     => 'required|numeric',
            'name'          => 'required',
            // 'last_paternal' => 'required',
            // 'last_maternal' => 'required',
            'sex'           => 'required',
            'department_id' => 'required',
            'province_id'   => 'required',
            'district_id'   => 'required'
        ]);

        $customer = Person::create([
            'type' => 'customers',
            'identity_document_type_id' => $this->identity_document_type_id,
            'number' => $this->number_id,
            'names' => $this->name,
            'country_id' => 'PE',
            'trade_name' => ($this->trade_name == null ? $this->name . ' ' . $this->last_paternal . ' ' . $this->last_maternal : $this->trade_name),
            'last_paternal' => $this->last_paternal,
            'last_maternal' => $this->last_maternal,
            'full_name' => $this->last_paternal . ' ' . $this->last_maternal . ' ' . $this->name,
            'department_id' => $this->department_id,
            'province_id'   => $this->province_id,
            'district_id'   => $this->district_id,
            'sex' => $this->sex
        ]);

        Customer::create(['person_id' => $customer->id, 'direct' => true, 'person_create' => Auth::user()->person_id]);

        $this->clearFormCustomer();
        $this->dispatchBrowserEvent('response_success_customer_store', ['idperson' => $customer->id, 'nameperson' => ($customer->number . ' - ' . $customer->trade_name), 'message' => Lang::get('labels.successfully_registered')]);
    }

    public function getProvinves()
    {
        $this->provinces = Province::where('department_id', $this->department_id)
            ->where('active', true)->get();
        $this->districts = [];
    }

    public function getPDistricts()
    {
        $this->districts = District::where('province_id', $this->province_id)
            ->where('active', true)->get();
    }

    public function createGlobalPayment($id, $destination)
    {
        $row['payment_destination_id'] = $destination;
        $billing = new Billing();
        $destination = $billing->getDestinationRecord($row);
        $company = SetCompany::where('main', true)->first();

        GlobalPayment::create([
            'user_id' => auth()->id(),
            'soap_type_id' => $company->soap_type_id,
            'destination_id' => $destination['destination_id'],
            'destination_type' => $destination['destination_type'],
            'payment_id' => $id,
            'payment_type' => RestSaleNotePayment::class
        ]);
    }

    private function setFilename($sale_note)
    {

        $name = [$sale_note->series, $sale_note->number, date('Ymd')];
        $sale_note->filename = join('-', $name);
        $sale_note->save();
    }

    public function createPdf($sale_note = null, $format_pdf = null)
    {

        ini_set("pcre.backtrack_limit", "5000000");
        $template = new Template();
        $pdf = new Mpdf();

        $company = SetCompany::where('main', true)->first();
        $document = $sale_note;

        $base_template = Parameter::where('id_parameter', 'PRT003THM')->first()->value_default;

        $html = $template->pdf($base_template, "rest_sale_note", $company, $document, $format_pdf);

        if (($format_pdf === 'ticket') or ($format_pdf === 'ticket_58')) {

            $width = ($format_pdf === 'ticket_58') ? 56 : 78;

            $company_logo      = ($company->logo) ? 40 : 0;
            $company_name      = (strlen($company->name) / 20) * 10;
            $company_address   = (strlen($document->establishment->address) / 30) * 10;
            $company_number    = $document->establishment->phone != '' ? '10' : '0';
            $customer_name     = strlen($document->customer->names) > '25' ? '10' : '0';
            $customer_address  = (strlen($document->customer->address) / 200) * 10;
            $p_order           = $document->purchase_order != '' ? '10' : '0';

            $total_exportation = $document->total_exportation != '' ? '10' : '0';
            $total_free        = $document->total_free != '' ? '10' : '0';
            $total_unaffected  = $document->total_unaffected != '' ? '10' : '0';
            $total_exonerated  = $document->total_exonerated != '' ? '10' : '0';
            $total_taxed       = $document->total_taxed != '' ? '10' : '0';
            $quantity_rows     = count($document->items);
            $payments          = $document->payments()->count() * 2;

            $extra_by_item_description = 0;
            $discount_global = 0;
            foreach ($document->items as $it) {
                if (strlen(json_decode($it->item)->name) > 100) {
                    $extra_by_item_description += 24;
                }
                if ($it->discounts) {
                    $discount_global = $discount_global + 1;
                }
            }
            $legends = $document->legends != '' ? '10' : '0';


            $pdf = new Mpdf([
                'mode' => 'utf-8',
                'format' => [
                    $width,
                    40 +
                        (($quantity_rows * 8) + $extra_by_item_description) +
                        ($discount_global * 3) +
                        $company_logo +
                        $payments +
                        $company_name +
                        $company_address +
                        $company_number +
                        $customer_name +
                        $customer_address +
                        $p_order +
                        $legends +
                        $total_exportation +
                        $total_free +
                        $total_unaffected +
                        $total_exonerated +
                        $total_taxed
                ],
                'margin_top' => 0,
                'margin_right' => 2,
                'margin_bottom' => 0,
                'margin_left' => 2
            ]);
        } else if ($format_pdf === 'a5') {

            $company_name      = (strlen($company->name) / 20) * 10;
            $company_address   = (strlen($document->establishment->address) / 30) * 10;
            $company_number    = $document->establishment->phone != '' ? '10' : '0';
            $customer_name     = strlen($document->customer->names) > '25' ? '10' : '0';
            $customer_address  = (strlen($document->customer->address) / 200) * 10;
            $p_order           = $document->purchase_order != '' ? '10' : '0';

            $total_exportation = $document->total_exportation != '' ? '10' : '0';
            $total_free        = $document->total_free != '' ? '10' : '0';
            $total_unaffected  = $document->total_unaffected != '' ? '10' : '0';
            $total_exonerated  = $document->total_exonerated != '' ? '10' : '0';
            $total_taxed       = $document->total_taxed != '' ? '10' : '0';
            $quantity_rows     = count($document->items);
            $discount_global = 0;
            foreach ($document->items as $it) {
                if ($it->discounts) {
                    $discount_global = $discount_global + 1;
                }
            }
            $legends           = $document->legends != '' ? '10' : '0';


            $alto = ($quantity_rows * 8) +
                ($discount_global * 3) +
                $company_name +
                $company_address +
                $company_number +
                $customer_name +
                $customer_address +
                $p_order +
                $legends +
                $total_exportation +
                $total_free +
                $total_unaffected +
                $total_exonerated +
                $total_taxed;
            $diferencia = 148 - (float) $alto;

            $pdf = new Mpdf([
                'mode' => 'utf-8',
                'format' => [
                    210,
                    $diferencia + $alto
                ],
                'margin_top' => 2,
                'margin_right' => 5,
                'margin_bottom' => 0,
                'margin_left' => 5
            ]);
        } else {

            $pdf_font_regular = config('tenant.pdf_name_regular');
            $pdf_font_bold = config('tenant.pdf_name_bold');

            if ($pdf_font_regular != false) {
                $defaultConfig = (new ConfigVariables())->getDefaults();
                $fontDirs = $defaultConfig['fontDir'];

                $defaultFontConfig = (new FontVariables())->getDefaults();
                $fontData = $defaultFontConfig['fontdata'];

                $pdf = new Mpdf([
                    'fontDir' => array_merge($fontDirs, [
                        app_path('CoreBilling' . DIRECTORY_SEPARATOR . 'Templates' .
                            DIRECTORY_SEPARATOR . 'pdf' .
                            DIRECTORY_SEPARATOR . $base_template .
                            DIRECTORY_SEPARATOR . 'font')
                    ]),
                    'fontdata' => $fontData + [
                        'custom_bold' => [
                            'R' => $pdf_font_bold . '.ttf',
                        ],
                        'custom_regular' => [
                            'R' => $pdf_font_regular . '.ttf',
                        ],
                    ]
                ]);
            }
        }

        $path_css = app_path('CoreBilling' . DIRECTORY_SEPARATOR . 'Templates' .
            DIRECTORY_SEPARATOR . 'pdf' .
            DIRECTORY_SEPARATOR . $base_template .
            DIRECTORY_SEPARATOR . 'style.css');

        $stylesheet = file_get_contents($path_css);

        $pdf->WriteHTML($stylesheet, HTMLParserMode::HEADER_CSS);
        $pdf->WriteHTML($html, HTMLParserMode::HTML_BODY);

        $footer = true;

        if ($footer) {
            $html_footer = $template->pdfFooter($base_template);
            $pdf->SetHTMLFooter($html_footer);
        }

        $this->uploadStorage($document->filename, $pdf->output('', 'S'), 'rest_sale_note');
    }

    public function validateForm()
    {
        //dd($this->customer_id);
        $this->external_id = null;

        $this->validate([
            'document_type_id' => 'required',
            'serie_id' => 'required',
            'correlative' => 'unique:sal_sale_notes,number,NULL,id,series,' . $this->serie_id,
            'f_issuance' => 'required',
            //'f_expiration' => 'required',
            'customer_id' => 'required'
        ]);


        $total_amount = 0;

        if ($this->payment_method_types > 0) {
            foreach ($this->payment_method_types as $key => $val) {
                $total_amount = $total_amount + $val['amount'];
            }
        }

        if ($this->total == $total_amount) {
            $this->store();
        } else {
            $this->dispatchBrowserEvent('response_payment_total_different', ['message' => Lang::get('labels.msg_totaldtc')]);
        }
    }

    public function store()
    {
        DB::beginTransaction();
        try{
        $this->selectCorrelative($this->serie_id);
        $establishment_json = SetEstablishment::where('id', $this->establishment_id)->first()->toArray();

        $customer_json = Person::where('id', $this->customer_id)->first()->toArray();
        $this->warehouse_id = InvLocation::where('establishment_id', $this->establishment_id)->where('state', true)->first()->id;
        //$company = SetCompany::first();
        list($di, $mi, $yi) = explode('/', $this->f_issuance);
        list($de, $me, $ye) = explode('/', $this->f_expiration);
        $date_of_issue = $yi . '-' . $mi . '-' . $di;
        //$date_of_due = $ye.'-'.$me.'-'.$de;

        $numberletters = new NumberNumberLetter();

        $legends = array('code' => 1000, 'value' => $numberletters->convertToLetter($this->total));

        $this->external_id = Str::uuid()->toString();
        $this->total_taxes = $this->total_igv;
        $paid = 0;
        foreach ($this->payment_method_types as $key => $value) {
            $paid = $paid + $value['amount'];
        }
        $this->restSaleNote = RestSaleNote::find($this->restSaleNote->id);
        DB::table('rest_sale_notes')->where('id', $this->restSaleNote->id)->update([
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
        $xxto = 0;
        DB::table('rest_sale_note_items')->where('sale_note_id', $this->restSaleNote->id)->delete();

        $sale_note=$this->restSaleNote;
        foreach ($this->box_items as $row) {

            RestSaleNoteItem::create([
                'sale_note_id' => $sale_note->id,
                'item_id' => $row['item_id'],
                'item' => $row['item'],
                'item_type' => $row['item_class'],
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


            if ($row['item_class'] == 'Modules\Inventory\Entities\InvItem') {
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
                        'kardexable_type' => RestSaleNote::class,
                        'location_id' => $this->warehouse_id,
                        'quantity' => (-$row['quantity']),
                        'detail' => 'Venta'
                    ]);
                }
            }
            $xxto = $xxto + $row['total'];
        }

        $billing = new Billing();
        $billing->saveCashDocument($sale_note->id, 'rest_sale_note');

        $this->savePayments($sale_note);

        SalSerie::where('id', $this->serie_id)->increment('correlative');

        $this->selectCorrelative($this->serie_id);

        $this->setFilename($sale_note);
        $this->createPdf($sale_note, "a4");

        $xoto = $this->order->total;
        if ($xxto == $xoto) {
            $this->order->update([
                'state' => 'Z'
            ]);
        }

        $user = Auth::user();
        $activity = new Activity;
        $activity->modelOn(SalSaleNote::class, $sale_note->id);
        $activity->causedBy($user);
        $activity->routeOn(route('sales_documents_sale_notes_create'));
        $activity->componentOn('sales::document.sale-notes-create-form');
        $activity->dataOld($sale_note);
        $activity->logType('create');
        $activity->log('Registro Edición de nota de venta');
        $activity->save();

        $this->dispatchBrowserEvent('response_sale_note_store', ['msg' => Lang::get('labels.successfully_registered')]);
        DB::commit();
    }catch(Exception $e){
        DB::rollback();
           dd($e);
        }
    }

    private function savePayments($sale_note)
    {
        list($di, $mi, $yi) = explode('/', $this->f_issuance);
        $date_of_issue = $yi . '-' . $mi . '-' . $di;
        DB::table('rest_sale_note_payments')->where('sale_note_id', $sale_note->id)->delete();
        foreach ($this->payment_method_types as $key => $value) {
            if ($value['amount'] > 0) {
                $payment = RestSaleNotePayment::create([
                    'sale_note_id' => $sale_note->id,
                    'date_of_payment' => $date_of_issue,
                    'payment_method_type_id' => $value['method'],
                    'payment_destination_id' => $value['destination'],
                    'reference' => $value['reference'],
                    'payment' => $value['amount']
                ]);
                $this->createGlobalPayment($payment->id, $value['destination']);
            }
        }
    }
}
