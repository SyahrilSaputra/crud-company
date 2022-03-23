<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return redirect('/login')->with('status', 'Email dan Password Tidak Cocok');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
