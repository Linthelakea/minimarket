<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username === 'admin' && $password === '12345') {
            return redirect('dashboard_admin');
        }

        if ($username === 'kasir' && $password === '54321') {
            return redirect('dashboard_kasir');
        }

        return back()->with('error', 'Username atau password salah!');
    }

}