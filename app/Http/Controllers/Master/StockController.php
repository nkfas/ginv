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
            $idcode = Idcreater::where('type', 'stock')
                ->selectRaw("MAX(CAST(code AS UNSIGNED)) as max_code")
                ->first()
                ->max_code;
        
            $this->_maxcode = $idcode + 1;
        } else {
            $this->_maxcode = $request->code;
        }
        
        $request->merge(['code' => $this->_maxcode]);
        
        $request->validate([
            'code' => ['required'],
            'name_en' => ['required'],
            'name_ar' => ['required'],
        ]);
               
        print_r($request);
        die();
        Stock::create([
            'code' =>  $this->_maxcode,
            'name' => $request->get('name_en'),
            'name_ar' => $request->get('name_ar'),
            'vat_id' => $request->get('vat_id'),
            'vat_percent' => $request->get('vat_percent'),
            'status' => $this->_status,
        ]);
        return redirect(route('stock', absolute: false));
    }


}
