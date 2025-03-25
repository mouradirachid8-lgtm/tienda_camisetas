<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';
    
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'user_dni'
    ];
    
    // Relación con usuario
    public function usuario() // Nota: en singular, no "usuarios"
    {
        return $this->belongsTo(User::class, 'user_dni', 'dni');
    }
    
    // Relación muchos a muchos con productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_carrito', 'carrito_id', 'producto_id')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
}