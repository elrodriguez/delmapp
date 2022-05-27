<?php

namespace Modules\Restaurant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestSaleNoteItem extends Model
{
    use HasFactory;
    protected $table = 'rest_sale_note_items';
    protected $fillable = [
        'sale_note_id',
        'item_id',
        'item',
        'item_type',
        'unit_value',
        'affectation_igv_type_id',
        'total_base_igv',
        'percentage_igv',
        'total_igv',
        'quantity',
        'system_isc_type_id',
        'total_base_isc',
        'percentage_isc',
        'total_isc',
        'total_base_other_taxes',
        'total_other_taxes',
        'total_taxes',
        'price_type_id',
        'unit_price',
        'total_value',
        'total_charge',
        'total_discount',
        'total',
        'attributes',
        'discounts',
        'charges',
        'kardex_id',
        'kardex_type',
        'warehouse_id'
    ];

    protected static function newFactory()
    {
        return \Modules\Restaurant\Database\factories\RestSaleNoteItemFactory::new();
    }

    public function sale_note()
    {
        return $this->belongsTo(\Modules\Restaurant\Entities\RestSaleNote::class, 'sale_note_id');
    }
}
