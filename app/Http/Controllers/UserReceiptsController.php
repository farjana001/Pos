<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserReceiptsController extends Controller
{
    public function index($id) {
        $user   = User::findOrFail($id);

          return view('users.receipts.user-receipts', compact('user'));
      }

}
