<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function confirmLogin(LoginRequest $request)
    {
        return $formData = $request->all();
    }
}
