<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function postlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
                if (Auth::user()->role == 'admin') {
                    return redirect('/dashboard');
                } else {
                    return redirect('/portal')->with('error', 'email atau password salah!');
                }
        }
        return redirect('/portal')->with('error', 'email atau password salah!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function login()
    {
        return view('admin.login');
    }
}
