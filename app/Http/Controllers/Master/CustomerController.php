<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Masters\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $_status;
    
    public function list(){
        $customers = Customer::get();
        return view('master.customer.customer',["customers"=> $customers]);
    }

    public function add(){

        return view('master.customer.add_customer');
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
            'name' => ['required'],
            'name_arabic' => ['required'],
            'customerPhoneCode' => ['required'],
            'customerPhone' => ['required'],
            'customerMobile' => ['required'],
            'email' => ['required'],
            'customeraddress' => ['required'],
            'customeraddressinar' => ['required'],
            'cr_no' => ['required']            
        ]);

        Customer::create([
            'code' => $request->get('code'),
            'customer_deal_id' => 1,
            'customer_group_id' => 0,
            'account_id' => 0,
            'name' => $request->get('name') ?? "",
            'name_ar' => $request->get('name_arabic') ?? "",
            'commercial_name'=>$request->get('commercial_name') ?? "",
            'commercial_name_ar'=>$request->get('commercial_name_ar') ?? "",
            'address' => $request->get('customeraddress') ?? "",
            'address_ar' => $request->get('customeraddressinar') ?? "",
            'phone_code' => $request->get('customerPhoneCode') ?? "",
            'phone' => $request->get('customerPhone') ?? "",
            'mobile' => $request->get('customerMobile') ?? "",
            'country_id' => $request->get('country_code') ?? "0",
            'region_id' => $request->get('region_code') ?? "0",
            'area_id' => $request->get('area_id') ?? "0",
            'salesman_id' => $request->get('salesman_id') ?? "0",
            'currency_id' => $request->get('currency_id') ?? "0",
            'cr_no' => $request->get('cr_no') ?? "",
            'vat_no' => $request->get('customervat') ?? "",
            'office_no' => $request->get('customeroff_no') ?? "",
            'customer_name' => $request->get('customer_name') ?? "",
            'vat_reg_number' => $request->get('vat_reg_number') ?? "",
            'country_code' => $request->get('country_code') ?? "",
            'customer_identification_number' => $request->get('customer_identification_number') ?? "",
            'city_name' => $request->get('city_name') ?? "",
            'street_name' => $request->get('street_name') ?? "",
            'building_no' => $request->get('building_no') ?? "",
            'additional_no' => $request->get('additional_no') ?? "",
            'postal_zone' => $request->get('postal_zone') ?? "",
            'city_subdivision_name' => $request->get('city_subdivision_name') ?? "",
            'country_subentity' => $request->get('country_subentity') ?? "",
            'email' => $request->get('email') ?? "",
            'status' => $this->_status ?? "",
        ]);

        return redirect(route('customer', absolute: false));

    }
 
    public function edit($id) {
        $customer = Customer::find($id);
        return view('master.customer.edit_customer', ["customer" => $customer]);
    }

    public function update($id,Request $request ){
        if ($request->status == "on" or $request->status == "active") {
             $this->_status = 'active';
         } else {
             $this->_status = 'inactive';
         }
        
             $customer = Customer::find($id); 
             $customer->code = $request->code;
             $customer->customer_deal_id = 1;
             $customer->customer_group_id = 0;  
             $customer->account_id= 0;
             $customer->name = $request->name ?? "" ;
             $customer->name_ar = $request->name_arabic ?? "" ;
             $customer->commercial_name = $request->commercial_name ?? "" ;
             $customer->commercial_name_ar = $request->commercial_name_ar ?? "" ;
             $customer->address = $request->customeraddress  ?? "" ;
             $customer->address_ar = $request->customeraddressinar  ?? "" ;
             $customer->phone_code = $request->customerPhoneCode ?? "" ;
             $customer->phone = $request->customerPhone ?? "" ;
             $customer->mobile = $request->customerMobile ?? "" ;
             $customer->country_id = $request->country_code ?? 0 ;
             $customer->region_id = $request->region_code ?? 0 ;
             $customer->area_id = $request->area_id ?? 0 ;
             $customer->salesman_id = $request->salesman_id ?? 0 ;
             $customer->currency_id = $request->currency_id ?? 0 ;
             $customer->cr_no = $request->cr_no ?? "" ;
             $customer->vat_no = $request->customervat ?? "" ;
             $customer->office_no = $request->customeroff_no ?? "" ;
             $customer->customer_name = $request->customer_name ?? "" ;
             $customer->vat_reg_number = $request->vat_reg_number ?? "" ;
             $customer->country_code = $request->country_code ?? "" ;
             $customer->customer_identification_number = $request->customer_identification_number ?? "" ;
             $customer->city_name = $request->city_name  ?? "" ;
             $customer->street_name = $request->street_name ?? "" ;
             $customer->building_no = $request->building_no ?? "" ;
             $customer->additional_no = $request->additional_no ?? "" ;
             $customer->postal_zone = $request->postal_zone ?? "" ;
             $customer->city_subdivision_name = $request->city_subdivision_name ?? "" ;
             $customer->country_subentity = $request->country_subentity ?? "" ;
             $customer->email = $request->email ?? "" ;
             $customer->status =  $this->_status;

         $customer->save();
 
         return redirect(route('customer', absolute: false));
     }
 
    public function delete($id){
        $cust = Customer::find($id);
        $headers =[]; 
        $cust->delete(); 
        return response()->json($cust, 200, $headers);
    }


}
