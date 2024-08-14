<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Masters\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list(){
        $customers = Customer::get();
        return view('master.customer.customer',["customers"=> $customers]);
    }

    public function add(){

        return view('master.customer.add_customer');
    }
}
