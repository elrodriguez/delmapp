<?php

namespace Modules\Restaurant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestDeliveryMan extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'order_id'
    ];

    protected static function newFactory()
    {
        return \Modules\Restaurant\Database\factories\RestDeliveryManFactory::new();
    }
}
