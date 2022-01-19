<?php

namespace App\Http\Controllers;

use App\Models\SaleInvoice;
use App\Models\User;
use Illuminate\Http\Request;

class UserSalesController extends Controller
{
    public function index($id) {
      $user   = User::findOrFail($id);

        return view('users.sales.show-user-sales', compact('user'));
    }

    // public function create() {
    //     return view('users.sales.create-user-sales');
    // }

    // public function store(Request $request) {

    // }

    // public function edit($id) {

    // }

    // public function update(Request $request, $id) {

    // }

    // public function destroy($id) {

    // }
}
