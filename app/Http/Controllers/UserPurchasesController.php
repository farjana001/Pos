<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPurchasesController extends Controller
{
    public function index($id) {
        $user = User::findOrFail($id);

        return view('users.purchases.user-purchases', compact('user'));
    }

    public function createInvoice(Request $request, $user_id){
        $request->validate([
            'date'          => 'required',
            'challan_no'    => 'nullable',
            'note'          => 'nullable',
        ]);

        $request['user_id']     =   $user_id;
        $request['admin_id']    =   Auth::id();

        $purchase_invoice = new PurchaseInvoice();

        $purchase_invoice->date         =   date('Y-m-d H:i:s', strtotime($request->date));
        $purchase_invoice->challan_no   =   $request->challan_no;
        $purchase_invoice->note         =   $request->note;
        $purchase_invoice->user_id      =   $request->user_id;
        $purchase_invoice->admin_id     =   $request->admin_id;

        $purchase_invoice->save();

        return redirect()->route('user.purchase', $user_id)->with('message', 'New purchase invoice added successfully');
    }

    public function showInvoice($user_id, $invoice_id){
        $user       = User::findOrFail($user_id);
        $invoice    = PurchaseInvoice::findOrFail($invoice_id);
        $products    = Product::all();
        $totalPayable = $invoice->items->sum('total');
        $totalPaid  = $invoice->payments->sum('amount');
        // dd($invoice->payments);
        $dueAmount  = $totalPayable - $totalPaid;


        return view('users.purchases.purchase-invoice', compact('invoice', 'user', 'products', 'totalPayable', 'totalPaid', 'dueAmount'));
    }

    public function addItem(Request $request, $user_id, $invoice_id){

        $request->validate([
            'product_id'    =>  'numeric|required',
            'quantity'      =>  'required',
            'price'         =>  'required',
            'total'         =>  'required'
        ]);

        $request['purchase_invoice_id']     = $invoice_id;

        $product_item = new PurchaseItem();

        $product_item->product_id           =   $request->product_id;
        $product_item->quantity             =   $request->quantity;
        $product_item->price                =   $request->price;
        $product_item->total                =   $request->total;
        $product_item->purchase_invoice_id      =   $request->purchase_invoice_id;

        $product_item->save();

        return redirect()->route('user.purchase.invoice.show', ['id' => $user_id, 'invoice_id' => $invoice_id])->with('message', 'New product added successfully');
    }

    public function removeItem($user_id, $invoice_id, $item_id) {

        $product_item = PurchaseItem::findOrFail($item_id);

        $product_item->delete();

        return redirect()->route('user.purchase.invoice.show', ['id' => $user_id, 'invoice_id' => $invoice_id])->with('message', 'Item deleted successfully');
    }

    public function destroy($user_id, $invoice_id) {

        $purchase_invoice = PurchaseInvoice::findOrFail($invoice_id);

        $purchase_invoice->delete();

        return redirect()->route('user.purchase', $user_id)->with('message', 'Purchase invoice item deleted successfully');
    }

}
