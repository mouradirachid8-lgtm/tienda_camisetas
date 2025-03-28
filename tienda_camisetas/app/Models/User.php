<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'usuario';

    /**
     * La clave primaria asociada con la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'DNI';

    /**
     * Indica si la clave primaria es autoincremental.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * El tipo de dato de la clave primaria.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'DNI',
        'nombre',
        'apellidos',
        'email',
        'telefono',
        'pais',
        'localidad',
        'direccion',
        'modo_pago',
        'fecha_registrado',
        'puntos_fidelidad',
        'admin',
        'password', // Asumiendo que necesitas una contraseña aunque no esté en la migración
    ];

    /**
     * Los atributos que deben estar ocultos para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser convertidos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_registrado' => 'date',
        'puntos_fidelidad' => 'integer',
        'admin' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Obtener el carrito del usuario.
     */
    public function carrito()
    {
        return $this->hasOne(Carrito::class, 'user_dni', 'DNI');
    }
}