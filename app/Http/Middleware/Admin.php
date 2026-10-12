<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
 
class Admin { 
    public function handle(Request $request, Closure $next){ 
        if (Auth::check()){ 
            if(Auth::user()->role == 'admin'){ 
                return $next($request); 
            } else { 
            abort(403); 
            } 
        } else { 
            return redirect()->route('login'); 
        } 
    }

    public function terminate(Request $request, $response)
    {
        Log::info('Request selesai', [
            'user' => Auth::user()?->name,
            'role' => Auth::user()?->role,
            'url' => $request->fullUrl(),
        ]);
    }
} 