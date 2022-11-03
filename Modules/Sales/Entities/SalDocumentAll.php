<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalDocumentAll extends Model
{
    use HasFactory;

    protected $fillable = ['document_id', 'entity_name'];

    protected static function newFactory()
    {
        return \Modules\Sales\Database\factories\SalDocumentAllFactory::new();
    }
}
