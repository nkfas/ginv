<?php

namespace App\Models\Masters\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Region extends Model
{
    use HasFactory;

    public function country()
    {
        // return $this->belongsTo(Country::class, 'country_id');
    }
}
