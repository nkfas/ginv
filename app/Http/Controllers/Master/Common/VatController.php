<?php

namespace App\Http\Controllers\Master\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masters\Common\Vat;

class VatController extends Controller
{
    private $_status;

    public function list(){
        $taxes = Vat::get();
        return view('master.common.vat.vat',["taxes"=>$taxes]);
    }

    public function add(){
        
        return view('master.common.vat.add_vat');
    }
   
    public function save(Request $request)
    {
        if ($request->status == "on") {
            $this->_status = 'active';
        } else {
            $this->_status = 'inactive';
        }
        $request->validate([
            'name_en' => ['required'],
            'name_ar' => ['required'],
            'persentage' => ['required']

        ]);

        Vat::create([
            'title' => $request->get('name_en'),
            'title_ar' => $request->get('name_ar'),
            'persentage' => $request->get('persentage'),
            'status' => $this->_status,
        ]);
        return redirect(route('vat', absolute: false));
    }

    public function update($id,Request $request ){
        if ($request->status == "on" or $request->status == "active") {
             $this->_status = 'active';
         } else {
             $this->_status = 'inactive';
         }
        
         $vat = Vat::find($id);
         $vat->title =$request->name_en;
         $vat->title_ar = $request->name_ar;
         $vat->persentage = $request->persentage;
         $vat->status =  $this->_status;
 
         $vat->save();
 
         return redirect(route('vat', absolute: false));
     }

     public function delete($id){
        $vat = Vat::find($id); 
        $headers =[]; 
         $vat->delete(); 
        return response()->json($vat, 200, $headers);
       
    }
 
    public function edit($id) {
        $taxes = Vat::find($id);   
        return view('master.common.vat.edit_vat', ["taxes" => $taxes]);
    }

}
