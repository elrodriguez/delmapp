<?php

namespace Modules\Restaurant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestSaleNote extends Model
{
    use HasFactory;
    protected $table = 'rest_sale_notes';
    protected $fillable = [
        'user_id',
        'external_id',
        'establishment_id',
        'establishment',
        'soap_type_id',
        'state_type_id',
        'prefix',
        'series',
        'number',
        'date_of_issue',
        'time_of_issue',
        'customer_id',
        'customer',
        'currency_type_id',
        'payment_method_type_id',
        'exchange_rate_sale',
        'apply_concurrency',
        'enabled_concurrency',
        'automatic_date_of_issue',
        'quantity_period',
        'type_period',
        'total_prepayment',
        'total_charge',
        'total_discount',
        'total_exportation',
        'total_free',
        'total_taxed',
        'total_unaffected',
        'total_exonerated',
        'total_igv',
        'total_base_isc',
        'total_isc',
        'total_base_other_taxes',
        'total_other_taxes',
        'total_taxes',
        'total_value',
        'total',
        'charges',
        'discounts',
        'prepayments',
        'guides',
        'related',
        'perception',
        'detraction',
        'legends',
        'filename',
        'order_note_id',
        'total_canceled',
        'changed',
        'paid',
        'license_plate',
        'plate_number',
        'reference_data',
        'observation',
        'purchase_order',
        'document_id'
    ];

    protected static function newFactory()
    {
        return \Modules\Restaurant\Database\factories\RestSaleNoteFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function soap_type()
    {
        return $this->belongsTo(\App\Models\SoapType::class);
    }

    public function establishment()
    {
        return $this->belongsTo(\Modules\Setting\Entities\SetEstablishment::class, 'establishment_id');
    }

    public function state_type()
    {
        return $this->belongsTo(\App\Models\StateType::class);
    }

    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'customer_id');
    }


    public function currency_type()
    {
        return $this->belongsTo(\App\Models\CurrencyType::class, 'currency_type_id');
    }

    public function items()
    {
        return $this->hasMany(\Modules\Restaurant\Entities\RestSaleNoteItem::class, 'sale_note_id');
    }
    public function payments()
    {
        return $this->hasMany(\Modules\Restaurant\Entities\RestSaleNotePayment::class, 'sale_note_id');
    }
}
