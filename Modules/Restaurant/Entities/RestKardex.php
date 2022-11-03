<?php

namespace Modules\Restaurant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestKardex extends Model
{
    use HasFactory;

    protected $fillable = [
        'command_id',
        'quantity',
        'movement_type_id',
        'state',
        'description'
    ];

    protected static function newFactory()
    {
        return \Modules\Restaurant\Database\factories\RestKardexFactory::new();
    }
}
