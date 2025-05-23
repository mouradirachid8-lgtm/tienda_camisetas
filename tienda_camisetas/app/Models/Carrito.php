<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Carrito extends Model
{
    protected $table = 'carrito';

    protected $fillable = ['user_dni'];

    // Relación con usuario
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_dni', 'dni');
    }

    // Relación muchos a muchos con productos
    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'producto_carrito', 'carrito_id', 'producto_id')
            ->withPivot('cantidad')
            ->withTimestamps();
    }

    // Agregar un producto al carrito
    public function addProducto(Producto $producto, int $cantidad = 1): void
    {
        if ($producto->es_disponible() && $cantidad > 0) {
            $this->productos()->syncWithoutDetaching([$producto->id => ['cantidad' => $cantidad]]);
        }
    }

    // Eliminar un producto del carrito
    public function deleteProducto(Producto $producto): void
    {
        $this->productos()->detach($producto->id);
    }

    // Obtener todos los productos del carrito
    public function getProductos(): array
    {
        return $this->productos()->get()->toArray();
    }

    // Calcular el total del carrito
    public function calcularTotal(): float
    {
        return $this->productos()->get()->sum(function ($producto) {
            return $producto->aplicar_descuento() * $producto->pivot->cantidad;
        });
    }

    // Vaciar el carrito
    public function vaciar(): void
    {
        $this->productos()->detach();
    }
}
