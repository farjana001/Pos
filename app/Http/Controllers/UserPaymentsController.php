<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPaymentsController extends Controller
{
    public function index($id) {
        $user   = User::findOrFail($id);

          return view('users.payments.payments', compact('user'));
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

        $payment = new Payment();

        $payment->date      = date('Y-m-d H:i:s', strtotime($request->date));
        $payment->amount    = $request->amount;
        $payment->note    = $request->note;
        $payment->user_id = $request['user_id'];
        $payment->admin_id = $request['admin_id'];

        $payment->save();

          return redirect()->route('user.payments', ['id' => $user_id])->with('message', 'New payment added successfully');
      }

      public function destroy($user_id, $payment_id) {
        $payment = Payment::findOrFail($payment_id);

        $payment->delete();
        return redirect()->route('user.payments', $user_id)->with('message', 'Payment deleted successfully');
      }
}
