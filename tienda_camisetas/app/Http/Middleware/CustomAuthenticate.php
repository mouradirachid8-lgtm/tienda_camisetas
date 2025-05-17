<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthenticate
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (!Auth::check()) {
            if (!$request->expectsJson()) {
                session()->put('url.intended', $request->url());
            }
            return redirect()->route('login')->with('error', 'Por favor inicia sesión');
        }

        // Comparte el usuario con todas las vistas
        view()->share('usuarioGlobal', Auth::user());

        return $next($request);
    }
}