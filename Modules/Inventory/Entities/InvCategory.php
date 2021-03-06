<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvCategory extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'status', 'category_id', 'module_id'];

    protected static function newFactory()
    {
        return \Modules\Inventory\Database\factories\InvCategoryFactory::new();
    }
}
