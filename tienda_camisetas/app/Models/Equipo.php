<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipo';
    
    // Campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'pais'];
    
    // Getters
    public function getNombre(): string
    {
        return $this->nombre;
    }
    
    public function getPais(): string
    {
        return $this->pais;
    }
}