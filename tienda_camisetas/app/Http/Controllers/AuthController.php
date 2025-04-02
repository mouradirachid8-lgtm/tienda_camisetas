<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Equipo;
use App\Models\Producto;

class AuthController extends Controller
{
    // Muestra el formulario de login
    public function showLogin()
    {
        return view('login');
    }

    // Procesa el login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Buscar usuario en la base de datos
        $usuario = User::where('email', $request->email)->first();

        // Verificar si el usuario existe
        if (!$usuario) {
            return redirect()->route('login')->with('error', 'Correo o contraseña incorrectos.');
        }

        // Verificar la contraseña
        if (!Hash::check($request->password, $usuario->password)) {
            return redirect()->route('login')->with('error', 'Correo o contraseña incorrectos.');
        }

        // Autenticar usuario
        Auth::login($usuario);
        session(['usuarioGlobal' => $usuario]);

        // Redirigir según si es admin o no
        return $usuario->admin
            ? redirect()->route('administrador')
            : redirect()->route('catalogo');
    }


    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Has cerrado sesión.');
    }
}
