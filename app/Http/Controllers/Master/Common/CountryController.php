<?php

namespace App\Http\Controllers\Master\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Masters\Common\Countrie;

class CountryController extends Controller
{
    public function country(){
        return view('master.common.country');
    }


    public function list() {
        $countries = Countrie::get();
        return view('master.common.country', ["countries" => $countries]);
    }
}
