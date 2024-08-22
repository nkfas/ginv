<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Masters\Common\Vat;
use App\Models\Masters\Stock;
use Illuminate\Http\Request;
use App\Models\Masters\Common\Idcreater;

class StockController extends Controller
{
    private $_status;
    private $_maxcode;
    private $_id_create;

    public function list(){    
        $quary = Stock::Join('vats', 'stocks.vat_id', '=', 'vats.id')
        ->select('stocks.*', 'vats.title as vat_type');
        $stocks =$quary->get();
        return view('master.stock.stock',["stocks"=>$stocks]);
    }

    public function add(){
        $vats= Vat::get();
           return view('master.stock.add_stock',["vats"=>$vats]);
    }

    public function save(Request $request)
    {  
       
        if ($request->status == "on") {
            $this->_status = 'active';
        } else {
            $this->_status = 'inactive';
        }
        if (empty($request->code)) {
            // $idcode = Idcreater::where('type', 'stock')
            //     ->selectRaw("MAX(CAST(code AS UNSIGNED)) as max_code ,id")
            //     ->first()
            //     ->max_code;
            $result = Idcreater::where('type', 'stock')
                ->selectRaw("code as max_code, id")
                ->first();
                $max_code = $result->max_code;
                $id = $result->id;
           
            $this->_maxcode = $max_code + 1;
            $this->_id_create = $id;
        } else {
            
            $this->_maxcode = $request->code;
        }
        
        $request->merge(['code' => $this->_maxcode]);
        
        $exists = Stock::where('code', $request->code)->exists();

        if (!$exists) {
           
            $request->validate([
                'code' => ['required'],
                'name_en' => ['required'],
                'name_ar' => ['required'],
                'percentage'=>['required'],
            ]);

            Stock::create([
                'code' =>  $this->_maxcode,
                'name' => $request->get('name_en'),
                'name_ar' => $request->get('name_ar'),
                'vat_id' => $request->get('vat_id'),
                'vat_percent' => $request->get('percentage'),
                'status' => $this->_status,
            ]);
            if(!empty($this->_id_create)){
                $id_gen_upd = Idcreater::find($this->_id_create);
                $id_gen_upd->code = $this->_maxcode;
                $id_gen_upd->save();
            }
            $this->_id_create="";
            $this->_maxcode="";
            // return response()->json(['message' => 'Stock created successfully']);
            return redirect(route('stock', absolute: false));
        } else {
           
            // return response()->json(['error' => 'Stock code already exists'], 400);
            return redirect(route('add-stock'));
        }
    }
    public function delete($id){
        $stock = Stock::find($id);
        $headers =[]; 
        $stock->delete(); 
        return response()->json($stock, 200, $headers);
    }

    public function edit($id) {
        $vats = Vat::get();
        $stock = Stock::join('vats', 'stocks.vat_id', '=', 'vats.id')
        ->select('stocks.*', 'vats.title as vat_type')
        ->where('stocks.id', $id)
        ->first();
        return view('master.stock.edit_stock', ["stock" => $stock,"vats" =>$vats]);
    }

    public function update($id,Request $request ){
        if ($request->status == "on" or $request->status == "active") {
             $this->_status = 'active';
         } else {
             $this->_status = 'inactive';
         }
         $fcode = Stock::where('code', $request->code)
         ->where('id', '!=', $id)
         ->count();
         if($fcode==0){
         $stock = Stock::find($id);
         $stock->code = $request->code;
         $stock->name = $request->name;
         $stock->name_ar =$request->name_ar;
         $stock->vat_id = $request->vat_id;
         $stock->vat_percent = $request->percentage;
         $stock->status =  $this->_status;
         $stock->save();
         }

         return redirect(route('stock', absolute: false));
     }

     public function showdelete($id){
        $stock =Stock::find($id);
        return  view('master.stock.delete_stock',['stock'=>$stock]);
     }


}
