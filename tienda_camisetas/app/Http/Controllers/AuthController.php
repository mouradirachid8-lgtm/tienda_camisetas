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


    // Registrar un nuevo usuario
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:usuario',
            'password' => 'required|string|min:8|confirmed',
            'pais' => 'required|string|max:20',
            'localidad' => 'required|string|max:20',
            'direccion' => 'required|string|max:200'
        ]);

        // Create the user
        $user = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'telefono' => $request->codigo_pais . $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pais' => $request->pais,
            'localidad' => $request->localidad,
            'direccion' => $request->direccion
        ]);

        // Log the user in
        Auth::login($user);

        return redirect()->route('catalogo');
    }

    public function rellena_paises()
    {
        $paises = [
            ['codigo' => '+34', 'nombre' => 'España'],
            ['codigo' => '+1', 'nombre' => 'EEUU'],
            ['codigo' => '+44', 'nombre' => 'Reino Unido'],
            ['codigo' => '+33', 'nombre' => 'Francia'],
            ['codigo' => '+49', 'nombre' => 'Alemania'],
            ['codigo' => '+39', 'nombre' => 'Italia'],
            ['codigo' => '+55', 'nombre' => 'Brasil'],
            ['codigo' => '+52', 'nombre' => 'México'],
            ['codigo' => '+57', 'nombre' => 'Colombia'],
            ['codigo' => '+54', 'nombre' => 'Argentina'],
            ['codigo' => '+7', 'nombre' => 'Rusia'],
            ['codigo' => '+86', 'nombre' => 'China'],
            ['codigo' => '+81', 'nombre' => 'Japón'],
            ['codigo' => '+91', 'nombre' => 'India'],
            ['codigo' => '+61', 'nombre' => 'Australia'],
            ['codigo' => '+82', 'nombre' => 'Corea del Sur'],
            ['codigo' => '+20', 'nombre' => 'Egipto'],
            ['codigo' => '+27', 'nombre' => 'Sudáfrica'],
            ['codigo' => '+62', 'nombre' => 'Indonesia'],
            ['codigo' => '+90', 'nombre' => 'Turquía'],
            ['codigo' => '+966', 'nombre' => 'Arabia Saudita'],
            ['codigo' => '+234', 'nombre' => 'Nigeria'],
            ['codigo' => '+880', 'nombre' => 'Bangladés'],
            ['codigo' => '+92', 'nombre' => 'Pakistán'],
        ];

        return view('auth.register', compact('paises'));
    }
}
