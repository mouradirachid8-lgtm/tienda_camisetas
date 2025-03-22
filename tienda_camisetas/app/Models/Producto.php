<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function carritos()
    {
        // descomentar en tener la tabla producto
        // return $this->belongsToMany(Carrito::class)->withPivot('cantidad');
    }
}