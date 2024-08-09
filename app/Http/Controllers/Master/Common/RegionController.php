<?php

namespace App\Http\Controllers\Master\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function region(){
        return view('master.common.region');
    }
}
