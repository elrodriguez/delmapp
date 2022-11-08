<?php

namespace Modules\Restaurant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestPreparationOrders extends Model
{
    use HasFactory;

    protected $fillable = [
        'command_id',
        'responsable_id',
        'quantity',
        'description'
    ];

    protected static function newFactory()
    {
        return \Modules\Restaurant\Database\factories\RestPreparationOrdersFactory::new();
    }
}
