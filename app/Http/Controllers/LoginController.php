<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function login() {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('dashboard');
        // }

        // return back()->withErrors([
        //     'message' => 'The provided credentials do not match our records.',
        // ]);
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:5',
        ]);

        $user = Admin::where('email','=',$request->email)->first();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect()->route('dashboard')->with('message', 'You have successfully logged in to the dashboard');
            }else {
                return back()->with('fail', 'Password not matches');
            }
        }
        else
        {
            return back()->with('fail', 'This email is not registered');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

}
