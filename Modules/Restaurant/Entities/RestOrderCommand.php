<?php

namespace Modules\Restaurant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestOrderCommand extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'command_id',
        'command_type',
        'quantity',
        'price',
        'discount',
        'total',
        'details'
    ];

    protected static function newFactory()
    {
        return \Modules\Restaurant\Database\factories\RestOrderCommandFactory::new();
    }
}
