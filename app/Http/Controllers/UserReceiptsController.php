<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReceiptsController extends Controller
{
    public function index($id) {
        $user   = User::findOrFail($id);

          return view('users.receipts.user-receipts', compact('user'));
      }

      public function store(Request $request, $user_id) {
        // $user   = User::findOrFail($id);

        $request->validate([
            'date' => 'required',
            'amount' => 'required',
            'note' => 'nullable',
        ]);
        $request['user_id'] = $user_id;
        $request['admin_id'] = Auth::id();

        $receipt = new Receipt();

        $receipt->date      = date('Y-m-d H:i:s', strtotime($request->date));
        $receipt->amount    = $request->amount;
        $receipt->note    = $request->note;
        $receipt->user_id = $request['user_id'];
        $receipt->admin_id = $request['admin_id'];

        $receipt->save();

          return redirect()->route('user.receipts', ['id' => $user_id])->with('message', 'New Receipt added successfully');
      }

      public function destroy($user_id, $receipt_id) {
        $receipt = Receipt::findOrFail($receipt_id);

        $receipt->delete();
        return redirect()->route('user.receipts', $user_id)->with('message', 'receipt deleted successfully');
      }

}
