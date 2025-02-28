<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    // Indicar la tabla si no sigue la convención de nombres en plural
    protected $table = 'proveedor';
    
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre'
    ];
    
    // Método getter para el nombre (del diagrama UML)
    public function getNombre()
    {
        return $this->nombre;
    }
    
    // Método setter para el nombre (del diagrama UML)
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    
    // Relación con los productos que provee
    public function productos()
    {
        return $this->hasMany(Producto::class, 'proveedor_id');
    }
}