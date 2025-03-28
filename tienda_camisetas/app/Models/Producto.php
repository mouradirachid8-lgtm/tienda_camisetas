<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Indicar la tabla si no sigue la convención de nombres en plural
    protected $table = 'producto';
    
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'talla',
        'precio',
        'stock',
        'color',
        'temporada',
        'material',
        'descuento',
        'imagen',
        'equipo_id',
        'proveedor_id',
        'talla_id'
    ];
    
    // Relación con Equipo (muchos productos pertenecen a un equipo)
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
    
    // Relación con Proveedor (muchos productos pertenecen a un proveedor)
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function talla()
    {
        return $this->belongsTo(Proveedor::class, 'talla_id');
    }
    
    // Relación muchos a muchos con Carrito
    public function carritos()
    {
        return $this->belongsToMany(Carrito::class, 'producto_carrito', 'producto_id', 'carrito_id')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
}