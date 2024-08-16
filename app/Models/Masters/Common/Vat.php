<?php

namespace App\Models\Masters\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_ar',
        'persentage',
        'status',   
    ];
}
