<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salehead extends Model
{
    use HasFactory;
    protected $fillable = [
        'invdate',   
        'invno',
        'cus_id',
        'cuscode',
        'total',
        'vat',
        'gtotal',
       
    ];
}
