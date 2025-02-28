<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    public function productos()
    {
        
        return $this->belongsToMany(Producto::class)->withPivot('cantidad');
    }
}


