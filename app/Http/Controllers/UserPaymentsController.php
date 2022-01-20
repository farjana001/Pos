<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPaymentsController extends Controller
{
    public function index($id) {
        $user   = User::findOrFail($id);

          return view('users.payments.payments', compact('user'));
      }
}
