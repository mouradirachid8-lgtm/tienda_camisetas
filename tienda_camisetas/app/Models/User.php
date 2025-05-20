<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'dni';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'dni', 'nombre', 'apellidos', 'email', 'telefono', 'pais',
        'localidad', 'direccion', 'modo_pago',
        'puntos_fidelidad', 'admin', 'password'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'fecha_registrado' => 'date',
        'puntos_fidelidad' => 'integer',
        'admin' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function carrito()
    {
        return $this->hasOne(Carrito::class, 'user_dni', 'dni');
    }

    // Métodos adicionales
    public function getDNI(): string { return $this->DNI; }
    public function getNombre(): string { return $this->nombre; }
    public function getApellidos(): string { return $this->apellidos; }
    public function getEMAIL(): string { return $this->email; }
    public function getTelefono(): string { return $this->telefono; }
    public function getDireccion(): string { return $this->direccion; }
    public function getModoPago(): string { return $this->modo_pago; }
    public function getPuntosFidelidad(): int { return $this->puntos_fidelidad; }
    public function getPassword(): string { return $this->password; }

    public function setDNI(string $dni): void { $this->DNI = $dni; }
    public function setNombre(string $nombre): void { $this->nombre = $nombre; }
    public function setApellidos(string $apellidos): void { $this->apellidos = $apellidos; }
    public function setEMAIL(string $email): void { $this->email = $email; }
    public function setTelefono(string $telefono): void { $this->telefono = $telefono; }
    public function setDireccion(string $direccion): void { $this->direccion = $direccion; }
    public function setModoPago(string $pago): void { $this->modo_pago = $pago; }
    public function setPuntosFidelidad(int $puntos): void { $this->puntos_fidelidad = $puntos; }
    public function setPassword(string $pass): void { $this->password = bcrypt($pass); }
}
