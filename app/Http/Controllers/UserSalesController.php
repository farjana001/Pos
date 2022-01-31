<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSalesController extends Controller
{
    public function index($id) {
      $user   = User::findOrFail($id);

        return view('users.sales.show-user-sales', compact('user'));
    }

    public function createInvoice(Request $request, $user_id){
        $request->validate([
            'date'          => 'required',
            'challan_no'    => 'nullable',
            'note'          => 'nullable',
        ]);

        $request['user_id']     =   $user_id;
        $request['admin_id']    =   Auth::id();

        $sale_invoice = new SaleInvoice();

        $sale_invoice->date         =   date('Y-m-d H:i:s', strtotime($request->date));
        $sale_invoice->challan_no   =   $request->challan_no;
        $sale_invoice->note         =   $request->note;
        $sale_invoice->user_id      =   $request->user_id;
        $sale_invoice->admin_id     =   $request->admin_id;

        $sale_invoice->save();

        return redirect()->route('user.sales', $user_id)->with('message', 'New sale invoice added successfully');
    }

    public function showInvoice($user_id, $invoice_id){
        $user       = User::findOrFail($user_id);
        $invoice    = SaleInvoice::findOrFail($invoice_id);
        $products    = Product::all();
        $totalPayable = $invoice->items->sum('total');
        $totalPaid  = $invoice->receipts->sum('amount');
        $dueAmount  = $totalPayable - $totalPaid;


        return view('users.sales.invoice', compact('invoice', 'user', 'products', 'totalPayable', 'totalPaid', 'dueAmount'));
    }

    public function addItem(Request $request, $user_id, $invoice_id){

        $request->validate([
            'product_id'    =>  'numeric|required',
            'quantity'      =>  'required',
            'price'         =>  'required',
            'total'         =>  'required'
        ]);

        $request['sale_invoice_id']     = $invoice_id;

        $product_item = new SaleItem();

        $product_item->product_id           =   $request->product_id;
        $product_item->quantity             =   $request->quantity;
        $product_item->price                =   $request->price;
        $product_item->total                =   $request->total;
        $product_item->sale_invoice_id      =   $request->sale_invoice_id;

        $product_item->save();

        return redirect()->route('user.sales.invoice.show', ['id' => $user_id, 'invoice_id' => $invoice_id])->with('message', 'New product added successfully');
    }

    public function removeItem($user_id, $invoice_id, $item_id) {

        $product_item = SaleItem::findOrFail($item_id);

        $product_item->delete();

        return redirect()->route('user.sales.invoice.show', ['id' => $user_id, 'invoice_id' => $invoice_id])->with('message', 'Item deleted successfully');
    }

    public function destroy($user_id, $invoice_id) {

        $sale_invoice = SaleInvoice::findOrFail($invoice_id);

        $sale_invoice->delete();

        return redirect()->route('user.sales', $user_id)->with('message', 'Sale invoice item deleted successfully');
    }



}
