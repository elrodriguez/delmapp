<?php

namespace Modules\Restaurant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'waiter_person_id', 'customer_person_name', 'discount', 'total', 'state'
    ];

    protected static function newFactory()
    {
        return \Modules\Restaurant\Database\factories\RestOrderFactory::new();
    }
}
