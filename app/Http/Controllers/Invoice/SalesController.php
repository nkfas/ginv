<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masters\Customer;

class SalesController extends Controller
{
    public function sale(){
       
        return view('invoice.sales.sales');
    }

    public function showAllcustomer(){
        $customer =Customer::where('customer_deal_id','1')
        ->get();
        $headers =[]; 
        return response()->json($customer, 200, $headers);
    }
}
