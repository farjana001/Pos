<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

//     public function authenticate(LoginRequest $request)
//     {
//         $data = $request->only('email', 'password');
// dd($data);

//         if (Auth::attempt($data)) {
//             return redirect()->intended('dashboard');
//         }
//         else {
//             return redirect()->route('login')->withErrors(['Invalid Username or Password']);
//         }
//     }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.'
        ]);
    }
}
