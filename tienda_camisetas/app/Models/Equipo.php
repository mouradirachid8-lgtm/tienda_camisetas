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

    public function setNombre(string $nombre): void
    {
        if (empty(trim($nombre))) {
            throw new \InvalidArgumentException("El nombre no puede estar vacío.");
        }
        $this->nombre = $nombre;
    }
    
    public function setPais(string $pais): void
    {
        if (empty(trim($pais))) {
            throw new \InvalidArgumentException("El pais no puede estar vacío.");
        }
        $this->pais = $pais;
    }
}
