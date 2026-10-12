<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Kasir
{
    /**
     * Handle an incoming request for Kasir.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'kasir' || Auth::user()->role === 'admin') {
                return $next($request);
            }
            abort(403, 'Akses ditolak: Halaman ini hanya untuk kasir.');
        }

        return redirect()->route('login');
    }
}
