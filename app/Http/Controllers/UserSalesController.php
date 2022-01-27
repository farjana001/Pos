<?php

namespace App\Http\Controllers;

use App\Models\SaleInvoice;
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
            'date' => 'required',
            'challan_no' => 'nullable',
            'note' => 'nullable',
        ]);

        $request['user_id'] = $user_id;
        $request['admin_id'] = Auth::id();

        $sale_invoice = new SaleInvoice();

        $sale_invoice->date = date('Y-m-d H:i:s', strtotime($request->date));
        $sale_invoice->challan_no = $request->challan_no;
        $sale_invoice->note = $request->note;
        $sale_invoice->user_id = $request->user_id;
        $sale_invoice->admin_id = $request->admin_id;

        $sale_invoice->save();

        return redirect()->route('user.sales', $user_id)->with('message', 'New sale invoice added successfully');
    }



}
