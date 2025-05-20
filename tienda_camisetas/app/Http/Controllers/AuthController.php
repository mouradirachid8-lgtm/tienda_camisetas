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
            $request->session()->regenerate(); // Importante para seguridad
            
            // Verificar si hay un producto pendiente
            if (session()->has('producto_pendiente')) {
                $producto_id = session()->get('producto_pendiente');
                $cantidad = session()->get('cantidad_pendiente', 1);
                
                // Limpiar la sesión
                session()->forget(['producto_pendiente', 'cantidad_pendiente', 'url_anterior']);
                
                // Agregar el producto al carrito automáticamente
                $user = Auth::user();
                $carrito = Carrito::firstOrCreate(['user_dni' => $user->DNI]);
                
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
            'DNI' => 'required|string|max:255',
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
            'DNI' => $request->DNI,
            'telefono' => $request->codigo_pais . $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pais' => $request->pais,
            'localidad' => $request->localidad,
            'direccion' => $request->direccion
        ]);

        // Log the user in
        Auth::login($user);
        
        // Verificar si hay un producto pendiente (similar al login)
        if (session()->has('producto_pendiente')) {
            $producto_id = session()->get('producto_pendiente');
            $cantidad = session()->get('cantidad_pendiente', 1);
            
            // Limpiar la sesión
            session()->forget(['producto_pendiente', 'cantidad_pendiente', 'url_anterior']);
            
            // Agregar el producto al carrito automáticamente
            $carrito = Carrito::firstOrCreate(['user_dni' => $user->DNI]);
            
            try {
                $producto = Producto::findOrFail($producto_id);
                
                if ($producto->es_disponible() && $producto->stock >= $cantidad) {
                    $carrito->productos()->attach($producto_id, ['cantidad' => $cantidad]);
                    
                    // Redirigir al carrito con mensaje de éxito
                    return redirect()->route('carrito.mostrar')
                        ->with('success', 'Cuenta creada y producto añadido a tu carrito');
                }
            } catch (\Exception $e) {
                // Si hay algún problema, seguir con el flujo normal
            }
        }

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