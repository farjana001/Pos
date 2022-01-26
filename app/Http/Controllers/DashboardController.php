<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $user = Admin::all();
        return view('welcome', compact('user'));
    }
}
