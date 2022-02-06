<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PurchaseItem;
use App\Models\Receipt;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller

{
    public function reportsOverView(Request $request) {
        $start_date     =   $request->get('start_date', date('Y-m-d'));
        $end_date       =   $request->get('end_date', date('Y-m-d'));


        $sales          =   SaleItem::select('products.title', DB::raw('SUM(sale_items.quantity) as quantity, SUM(sale_items.total) as total'))
                                    ->join('products', 'sale_items.product_id', '=', 'products.id')
                                    ->join('sale_invoices', 'sale_items.sale_invoice_id', '=', 'sale_invoices.id')
                                    ->whereBetween('sale_invoices.date', [$start_date, $end_date])
                                    ->groupBy('products.title')
                                    ->get();

        $purchases      =   PurchaseItem::select('products.title', DB::raw('SUM(purchase_items.quantity) as quantity, SUM(purchase_items.total) as total'))
                                    ->join('products', 'purchase_items.product_id', '=', 'products.id')
                                    ->join('purchase_invoices', 'purchase_items.purchase_invoice_id', '=', 'purchase_invoices.id')
                                    ->whereBetween('purchase_invoices.date', [$start_date, $end_date])
                                    ->groupBy('products.title')
                                    ->get();


        $receipts       =   Receipt::select('users.name', 'users.phone', DB::raw('SUM(receipts.amount) as amount'))
                                    ->join('users', 'receipts.user_id', '=', 'users.id')
                                    ->groupBy('users.name', 'users.phone')
                                    ->whereBetween('date', [$start_date, $end_date])
                                    ->get();

        $payments       =   Payment::select('users.name', 'users.phone', DB::raw('SUM(payments.amount) as amount'))
                                    ->join('users', 'payments.user_id', '=', 'users.id')
                                    ->groupBy('users.name', 'users.phone')
                                    ->whereBetween('date', [$start_date, $end_date])
                                    ->get();

        return view('reports.reports-overview', compact('sales', 'purchases', 'receipts', 'payments', 'start_date', 'end_date'));
    }

    public function salesReport(Request $request){

        $start_date     =   $request->get('start_date', date('Y-m-d'));
        $end_date       =   $request->get('end_date', date('Y-m-d'));

        $sales          =   SaleItem::select( 'sale_items.quantity', 'sale_items.price', 'sale_items.total', 'products.title', 'sale_invoices.challan_no', 'sale_invoices.date')
                                    ->join('products', 'sale_items.product_id', '=', 'products.id')
                                    ->join('sale_invoices', 'sale_items.sale_invoice_id', '=', 'sale_invoices.id')
                                    ->whereBetween('sale_invoices.date', [$start_date, $end_date])
                                    ->get();

        return view('reports.sales-report', compact('sales', 'start_date', 'end_date'));
    }

    public function purchasesReport(Request $request){

        $start_date     =   $request->get('start_date', date('Y-m-d'));
        $end_date       =   $request->get('end_date', date('Y-m-d'));

        $purchases          =   PurchaseItem::select( 'purchase_items.quantity', 'purchase_items.price', 'purchase_items.total', 'products.title', 'purchase_invoices.challan_no', 'purchase_invoices.date')
                                    ->join('products', 'purchase_items.product_id', '=', 'products.id')
                                    ->join('purchase_invoices', 'purchase_items.purchase_invoice_id', '=', 'purchase_invoices.id')
                                    ->whereBetween('purchase_invoices.date', [$start_date, $end_date])
                                    ->get();

        return view('reports.purchases-report', compact('purchases', 'start_date', 'end_date'));
    }

    public function receiptsReport(Request $request){

        $start_date     =   $request->get('start_date', date('Y-m-d'));
        $end_date       =   $request->get('end_date', date('Y-m-d'));

        $receipts          =   Receipt::whereBetween('date', [$start_date, $end_date])->get();

        return view('reports.receipts-report', compact('receipts', 'start_date', 'end_date'));
    }

    public function paymentsReport(Request $request){

        $start_date     =   $request->get('start_date', date('Y-m-d'));
        $end_date       =   $request->get('end_date', date('Y-m-d'));

        $payments          =   Payment::whereBetween('date', [$start_date, $end_date])->get();

        return view('reports.payments-report', compact('payments', 'start_date', 'end_date'));
    }


}
