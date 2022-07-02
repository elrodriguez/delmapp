<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvItemPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'measure_id',
        'description',
        'units',
        'price',
        'main'
    ];

    protected static function newFactory()
    {
        return \Modules\Inventory\Database\factories\InvItemPriceFactory::new();
    }
}
