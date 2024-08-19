<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Masters\Common\Vat;

class Stock extends Model
{
    use HasFactory;

    public function vat()
    {
        return $this->belongsTo(Vat::class, 'vat_id');
    }
    protected $fillable = [
        'code',
        'name',
        'name_ar',
        'vat_id',
        'vat_percent',
        'status',   
    ];
}
