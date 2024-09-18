<?php

namespace App\Http\Controllers\Master\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Masters\Common\Countrie;
use Illuminate\Support\Collection;

class CountryController extends Controller
{
    private $_status;

    public function add()
    {
        return view('master.common.country.add_country');
    }

    public function list()
    {
        // $countries = Countrie::get();
        $countries = Countrie::withCount('regions')->get();
        return view('master.common.country.country', ["countries" => $countries]);
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

        Countrie::create([
            'code' => $request->get('code'),
            'title' => $request->get('name_en'),
            'title_ar' => $request->get('name_ar'),
            'status' => $this->_status,
        ]);
        return redirect(route('country', absolute: false));
    }
    public function edit($id) {
        $country = Countrie::find($id);
        return view('master.common.country.edit_country', ["country" => $country]);
    }
    public function update($id,Request $request ){
       if ($request->status == "on" or $request->status == "active") {
            $this->_status = 'active';
        } else {
            $this->_status = 'inactive';
        }

        $country = Countrie::find($id);
        $country->code = $request->code;
        $country->title =$request->name_en;
        $country->title_ar = $request->name_ar;
        $country->status =  $this->_status;

        $country->save();

        return redirect(route('country', absolute: false));
    }

    public function view_acive_and_inactive() {

        $countries = Countrie::all();

         
        $activeCountries = $countries->filter(function ($country) {
            return $country->status == 'active'; 
        });

        $inactiveCountries = $countries->filter(function ($country) {
            return $country->status == 'inactive';   
        });

         
         return view('master.common.country.country_active_inactive', compact('activeCountries', 'inactiveCountries'));
        
    }
}
