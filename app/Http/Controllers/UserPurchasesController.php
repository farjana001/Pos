<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPurchasesController extends Controller
{
    public function index($id) {
        $user = User::findOrFail($id);

        return view('users.purchases.user-purchases', compact('user'));
    }
}
