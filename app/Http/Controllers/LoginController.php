<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $name = $request->input('username', $request->input('name'));
        $password = $request->input('password');

        if (!$name || !$password) {
            return back()->with('error', 'Username dan password wajib diisi.');
        }

        if (Auth::attempt(['name' => $name, 'password' => $password])) {

            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            if (Auth::user()->role === 'kasir') {
                return redirect('/kasir/dashboard');
            }

            return redirect('/');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
    }
}