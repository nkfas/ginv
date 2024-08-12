<?php

namespace App\Models\Masters\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'title_ar',
        'status',   
    ];
}
