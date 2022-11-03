<?php

namespace Modules\Restaurant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestDiscardOrders extends Model
{
    use HasFactory;

    protected $fillable = [
        'kardex_id',
        'responsable_id',
        'quantity'
    ];

    protected static function newFactory()
    {
        return \Modules\Restaurant\Database\factories\RestDiscardOrdersFactory::new();
    }
}
