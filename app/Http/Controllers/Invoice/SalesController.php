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
use Barryvdh\DomPDF\Facade\Pdf;

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
            ->where('code', 'like', "%$request->term%")
            ->orWhere('name', 'like', "%$request->term%")
            ->orWhere('name_ar', 'like',"%$request->term%")
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
        
             $_maxInvoice = DB::transaction(function () use ($request) { 

                $_maxInvoice = $this->generateNextInvoiceNo();   
                $_cuscode = Customer::where('id', $request->customercode)->first();
                $headers =[]; 
               
                $saleh = Salehead::create([
                    'invdate' => $request->get('invdate'),
                    'invno' => $_maxInvoice,
                    'cus_id' => $request->get('customercode'),
                    'cuscode' => $_cuscode->code,
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
                return [
                    'invoice_number' => $_maxInvoice,
                    'saleh_id' => $saleh->id
                ];
                
             });
            
             return response()->json($_maxInvoice, 200);
       
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
    public function printSales($id)
    {
        // Fetching sales header data
        $salesHData = Salehead::join('customers', 'saleheads.cus_id', '=', 'customers.id')
            ->select('saleheads.*', 'customers.code', 'customers.account_id', 'customers.name as cusengname', 'customers.name_ar as cusarname',
                'customers.address', 'customers.address_ar', 'customers.phone', 'customers.mobile'
            )
            ->where('saleheads.id', $id)->first();

            // print_r($salesHData);
            // die();
    
        // Fetching sale items data
        $salesData = Sale_items::join('stocks', 'sale_items.stock_id', '=', 'stocks.id')
            ->select('sale_items.*', 'stocks.name', 'stocks.name_ar', 'stocks.vat_id', 'stocks.vat_percent')
            ->where('sale_items.saleh_id', $id) // Assuming saleh_id is linked to sale_items
            ->get();
    
        // Check if sales data is not null
        if (!$salesHData || !$salesData) {
            return redirect()->back()->withErrors('Sales data not found.');
        }
    
        // Load the PDF view with the sales data
        $pdf = Pdf::loadView('invoice.sales.reports.sales_invoice', compact('salesHData', 'salesData'));
    
        // Return the PDF as a stream to display in browser
        return $pdf->stream('sales-invoice.pdf');
    }
    
}
