<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    // Indicar la tabla si no sigue la convención de nombres en plural
    protected $table = 'talla';
    
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'id',
        'nombre'
    ];

    public function getNombre()
    {
        return $this->nombre;
    }
    
    // Método setter para el nombre (del diagrama UML)
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
}
