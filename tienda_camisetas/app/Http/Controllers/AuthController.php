<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Equipo;
use App\Models\Producto;
use App\Models\Carrito;

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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            
            // Verificar si hay un producto pendiente
            if (session()->has('producto_pendiente')) {
                $producto_id = session()->get('producto_pendiente');
                $cantidad = session()->get('cantidad_pendiente', 1);
                
                // Limpiar la sesión
                session()->forget(['producto_pendiente', 'cantidad_pendiente', 'url_anterior']);
                
                // Agregar el producto al carrito automáticamente
                $user = Auth::user();
                $carrito = Carrito::firstOrCreate(['user_dni' => $user->dni]); // Cambiado a minúsculas
                
                try {
                    $producto = Producto::findOrFail($producto_id);
                    
                    if ($producto->es_disponible() && $producto->stock >= $cantidad) {
                        // Verificar si el producto ya existe en el carrito
                        $itemExistente = $carrito->productos()->where('producto_id', $producto_id)->first();
                        
                        if ($itemExistente) {
                            $nuevaCantidad = $itemExistente->pivot->cantidad + $cantidad;
                            if ($nuevaCantidad <= $producto->stock) {
                                $carrito->productos()->updateExistingPivot($producto_id, [
                                    'cantidad' => $nuevaCantidad
                                ]);
                            }
                        } else {
                            $carrito->productos()->attach($producto_id, ['cantidad' => $cantidad]);
                        }
                        
                        // Redirigir al carrito con mensaje de éxito
                        return redirect()->route('carrito.mostrar')
                            ->with('success', 'Has iniciado sesión y hemos añadido el producto a tu carrito');
                    }
                } catch (\Exception $e) {
                    // Si hay algún problema, seguir con el flujo normal
                }
            }
            
            // Redirección normal si no hay producto pendiente
            return $request->user()->admin
                ? redirect()->route('administrador')
                : redirect()->route('catalogo');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ]);
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Has cerrado sesión.');
    }

    // Mostrar formulario de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Registrar un nuevo usuario
    public function register(Request $request)
    {
        // Debug temporal - descomenta para ver qué datos llegan
        // \Log::info('Datos recibidos:', $request->all());
        
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|regex:/^[0-9]{8}[A-Z]$/i|unique:users,dni', // Cambiado a minúsculas
            'telefono' => 'required|string|regex:/^[0-9]{9}$/',
            'codigo_pais' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'pais' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'direccion' => 'required|string|max:255'
        ], [
            'dni.required' => 'El DNI es obligatorio.',
            'dni.regex' => 'El DNI debe tener 8 números y una letra.',
            'dni.unique' => 'Este DNI ya está registrado.',
            'telefono.regex' => 'El teléfono debe tener 9 dígitos.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.'
        ]);

        // Combinar código de país con teléfono
        $telefonoCompleto = $validated['codigo_pais'] . ' ' . $validated['telefono'];
        
        // Crear el usuario
        $user = User::create([
            'dni' => strtoupper($validated['dni']), // Asegurar que la letra esté en mayúsculas
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'telefono' => $telefonoCompleto,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'pais' => $validated['pais'],
            'localidad' => $validated['localidad'],
            'direccion' => $validated['direccion'],
            'modo_pago' => 'efectivo', // Valor por defecto
            'puntos_fidelidad' => 0,    // Valor inicial
            'admin' => false            // Por defecto no es admin
        ]);

        // Log the user in
        Auth::login($user);
        
        // Crear carrito para el nuevo usuario
        Carrito::firstOrCreate(['user_dni' => $user->dni]);
        
        // Verificar si hay un producto pendiente (similar al login)
        if (session()->has('producto_pendiente')) {
            $producto_id = session()->get('producto_pendiente');
            $cantidad = session()->get('cantidad_pendiente', 1);
            
            // Limpiar la sesión
            session()->forget(['producto_pendiente', 'cantidad_pendiente', 'url_anterior']);
            
            try {
                $producto = Producto::findOrFail($producto_id);
                
                if ($producto->es_disponible() && $producto->stock >= $cantidad) {
                    $user->carrito->productos()->attach($producto_id, ['cantidad' => $cantidad]);
                    
                    // Redirigir al carrito con mensaje de éxito
                    return redirect()->route('carrito.mostrar')
                        ->with('success', 'Cuenta creada y producto añadido a tu carrito');
                }
            } catch (\Exception $e) {
                // Si hay algún problema, seguir con el flujo normal
            }
        }

        return redirect()->route('catalogo')->with('success', '¡Registro exitoso! Bienvenido.');
    }

    // Método para mostrar el formulario con países
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