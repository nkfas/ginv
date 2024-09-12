<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masters\Customer;
use App\Models\Masters\Stock;
use Illuminate\Support\Facades\DB;
use  App\Models\Invoice\Salehead;
use  App\Models\Invoice\Sale_items;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class SalesController extends Controller
{
    public function sale()
    {

        return view('invoice.sales.sales');
    }

    public function showAllcustomer(Request $request)
    {
        $customer = Customer::select(['id', 'code', 'name as text', 'vat_no'])
            ->where('customer_deal_id', '1')
            ->where(function ($query) {
                $query->where('name', 'like', '%')
                    ->orWhere('vat_no', 'like', '%');
            })
            ->get();

        $headers = [];

        return response()->json($customer, 200, $headers);
    }

    public function stockShow(Request $request)
    {
        $stocks = Stock::select(['id', 'code', 'name as text', 'name_ar', 'vat_id', 'vat_percent'])
            ->where('code', 'like', '%')
            ->orWhere('name', 'like', '%')
            ->orWhere('name_ar', 'like', '%')
            ->get();
        $headers = [];
        return response()->json($stocks, 200, $headers);
    }

    public function save(Request $request)
    {
        
     $request->validate([
            'customercode' => ['required'],
            'sumbefordisc' => ['required'],
            'grandbefordisc' => ['required'],
            'invoice.sno.*' => ['required'],
            'invoice.stock_id.*' => ['required'],

        ]);
       
    // $validator = Validator::make($request->all(),[
    //     'customercode' => ['required'],
    //     'sumbefordisc' => ['required'],
    //     'grandbefordisc' => ['required'],
    //     'invoice.sno.*' => ['required'],
    //     'invoice.stock_id.*' => ['required'],
    // ]);
    // if ($validator->fails()) {
    //     print_r($validator->errors());
    // }
        
        
        
             DB::transaction(function () use ($request) {
                $_maxInvoice = $this->generateNextInvoiceNo();
                $_cuscode = Customer::where('id', $request->customercode)->first();
                $headers =[]; 
                $saleh = Salehead::create([
                    'invdate' => $request->get('invdate'),
                    'invno' => $_maxInvoice,
                    'cus_id' => $request->get('customercode'),
                    'cuscode' => $_cuscode->get('code'),
                    'total' => $request->get('sumbefordisc'),
                    'vat' => $request->get('sumVat'),
                    'gtotal' => $request->get('grandbefordisc'),
                ]);
                $invoices = $request->get('invoice');
                // print_r($invoices);
                // die();
                // Check if $invoices is an array and loop correctly
                if (is_array($invoices) && !empty($invoices)) {
                    foreach ($invoices as &$invoice) { // Use a reference to modify each invoice directly
                        $invoice['saleh_id'] = $saleh->id; // Add the saleh_id to each invoice item
                        unset($invoice['sno']);
                        unset($invoice['itemname']); // Remove itemname from each invoice
                        $invoice['discp']= $invoice['discp']??0;
                        $invoice['discamt']= $invoice['discamt']??0;    
                        
                    }
                                  
                    // Bulk insert the invoices into sale_items table
                    Sale_items::insert($invoices);

                    // return redirect()->back()->with([
                    //     'success' => 'Transaction committed successfully!',
                    //     'invoiceNumber' => $_maxInvoice
                    // ]);
                }
                return response()->json($saleh, 200, $headers);
             });

       
    }
    private function generateNextInvoiceNo()
    {
        // Fetch the last invoice by id
        $lastInvoice = Salehead::orderBy('id', 'desc')->first();
        if ($lastInvoice && preg_match('/^([A-Z]+)(\d+)$/', $lastInvoice->invno, $matches)) {
            $prefix = $matches[1]; // Extracts 'SA'
            $number = (int)$matches[2]; // Extracts '00001' and converts to an integer
            $nextNumber = $number + 1; // Increment the number
            $nextInvoiceNo = $prefix . str_pad($nextNumber, strlen($matches[2]), '0', STR_PAD_LEFT); // Reformat with leading zeros
        } else {
            // Default to 'SA00001' if no records are found
            $nextInvoiceNo = 'SA00001';
        }

        // Optional: Use the generated invoice number
        return $nextInvoiceNo;
    }
}
