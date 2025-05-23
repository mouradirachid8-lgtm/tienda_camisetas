<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthenticate
{
    public function handle(Request $request, Closure $next, $role = 'admin')
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($role === 'admin' && !Auth::user()->admin) {
            return redirect('/')->with('error', 'Se requieren permisos de administrador');
        }

        return $next($request);
    }
}