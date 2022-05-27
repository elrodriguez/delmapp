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
        'description',
        'quantity',
        'price',
        'discount',
        'total',
        'details',
        'command_local',
        'state'
    ];

    protected static function newFactory()
    {
        return \Modules\Restaurant\Database\factories\RestOrderCommandFactory::new();
    }
}
