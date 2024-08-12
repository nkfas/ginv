<?php

namespace App\Http\Controllers\Master\Common;

use App\Http\Controllers\Controller;
use  App\Models\Masters\Common\Countrie;
use App\Models\Masters\Common\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    private $_status;
    public function add(){
        $countries = Countrie::get();
        return view('master.common.add_region',["countries" => $countries]);
    }

    public function list()
    {
        $regions = Region::Join('countries', 'regions.country_id', '=', 'countries.id')
        ->select('regions.*', 'countries.title as country_nameEn','countries.title_ar as country_nameAr')
        ->get();
        return view('master.common.region', ["regions" => $regions]);
    }

    public function save(Request $request)
    {
        if ($request->status == "on") {
            $this->_status = 'active';
        } else {
            $this->_status = 'inactive';
        }
        $request->validate([
            'code' => ['required'],
            'name_en' => ['required'],
            'name_ar' => ['required']

        ]);

        Region::create([
            'country_id' => $request->get('country_id'),
            'code' => $request->get('code'),
            'title' => $request->get('name_en'),
            'title_ar' => $request->get('name_ar'),
            'status' => $this->_status,
        ]);
        return redirect(route('region', absolute: false));
    }

    public function edit($id) {
        $countries = Countrie::get();
        $region = Region::join('countries', 'regions.country_id', '=', 'countries.id')
        ->select('regions.*', 'countries.title as country_nameEn', 'countries.title_ar as country_nameAr')
        ->where('regions.id', $id)
        ->first();
        return view('master.common.edit_region', ["region" => $region,"countries" =>$countries]);
    }

    public function update($id,Request $request ){
        if ($request->status == "on" or $request->status == "active") {
             $this->_status = 'active';
         } else {
             $this->_status = 'inactive';
         }
 
         $region = Region::find($id);
         $region->country_id = $request->country_id;
         $region->code = $request->code;
         $region->title =$request->name_en;
         $region->title_ar = $request->name_ar;
         $region->status =  $this->_status;
 
         $region->save();
 
         return redirect(route('region', absolute: false));
     }


}
