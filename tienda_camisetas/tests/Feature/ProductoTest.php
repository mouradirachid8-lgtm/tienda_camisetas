<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_producto_se_puede_crear(): void
    {
        $this->assertDatabaseHas('producto', [
            'id' => '1',
            'nombre'=> 'Camiseta Oficial FC Barcelona',
        ]);
    }

    public function test_producto_tiene_proveedor_asociado(): void
    {
        $producto = \App\Models\Producto::find(1);
        $this->assertEquals('Nike', $producto->proveedor->nombre);
    }

    public function test_producto_tiene_equipo_asociado(): void
    {
        $producto = \App\Models\Producto::find(2);
        $this->assertEquals('Real Madrid', $producto->equipo->nombre);
    }
}
