<?php

// /Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $paises = [
            ['codigo' => '+34', 'nombre' => 'España'],
            ['codigo' => '+1', 'nombre' => 'Estados Unidos'],
            ['codigo' => '+44', 'nombre' => 'Reino Unido'],
            ['codigo' => '+33', 'nombre' => 'Francia'],
            ['codigo' => '+49', 'nombre' => 'Alemania'],
            ['codigo' => '+39', 'nombre' => 'Italia'],
            ['codigo' => '+52', 'nombre' => 'México'],
            ['codigo' => '+54', 'nombre' => 'Argentina'],
            ['codigo' => '+55', 'nombre' => 'Brasil'],
            ['codigo' => '+351', 'nombre' => 'Portugal'],
        ];
        
        return view('auth.register', compact('paises'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'dni' => ['required', 'string', 'regex:/^[0-9]{8}[A-Z]$/i', 'unique:users,dni'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'telefono' => ['required', 'string', 'regex:/^[0-9]{9}$/'],
            'codigo_pais' => ['required', 'string'],
            'pais' => ['required', 'string', 'max:255'],
            'localidad' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'dni.required' => 'El DNI es obligatorio.',
            'dni.regex' => 'El DNI debe tener 8 números y una letra.',
            'dni.unique' => 'Este DNI ya está registrado.',
            'nombre.required' => 'El nombre es obligatorio.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.regex' => 'El teléfono debe tener 9 dígitos.',
            'codigo_pais.required' => 'El código de país es obligatorio.',
            'pais.required' => 'El país es obligatorio.',
            'localidad.required' => 'La localidad es obligatoria.',
            'direccion.required' => 'La dirección es obligatoria.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Combinar código de país con teléfono
        $telefonoCompleto = $data['codigo_pais'] . ' ' . $data['telefono'];
        
        // Convertir DNI a mayúsculas para consistencia
        $dni = strtoupper($data['dni']);
        
        return User::create([
            'dni' => $dni,
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'telefono' => $telefonoCompleto,
            'pais' => $data['pais'],
            'localidad' => $data['localidad'],
            'direccion' => $data['direccion'],
            'password' => Hash::make($data['password']),
            'modo_pago' => 'efectivo', // Valor por defecto
            'puntos_fidelidad' => 0,    // Valor inicial
            'admin' => false,           // Por defecto no es admin
        ]);
    }
}