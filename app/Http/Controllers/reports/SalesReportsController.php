<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SalesReportsController extends Controller
{
    public function index(Request $request){
        $start_date = $request->get('start_date', date('Y-m-d'));
        $end_date = $request->get('end_date', date('Y-m-d'));
        $sales = SaleItem::select( 'sale_items.quantity', 'sale_items.price', 'sale_items.total', 'products.title', 'sale_invoices.challan_no', 'sale_invoices.date')
                        ->join('products', 'sale_items.product_id', '=', 'products.id')
                        ->join('sale_invoices', 'sale_items.sale_invoice_id', '=', 'sale_invoices.id')
                        ->whereBetween('sale_invoices.date', [$start_date, $end_date])
                        ->get();
        return view('reports.sales-report', compact('sales', 'start_date', 'end_date'));
    }
}
