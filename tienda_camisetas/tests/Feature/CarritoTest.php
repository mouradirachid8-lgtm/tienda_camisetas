<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarritoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_se_puede_crear_carrito(): void
    {
        $this->assertDatabaseHas('carrito', [
            'id' => '1',
        ]);
    }
    public function test_carrito_asocia_un_dni(): void
    {
        $this->assertDatabaseHas('carrito', [
            'user_dni' => '11223344C',
        ]);
    }

    public function test_usuario_asociado_al_carrito(): void
    {
        $carrito = \App\Models\Carrito::find(1);
        $this->assertEquals('Carlos', $carrito->usuario->nombre);
    }    

    public function test_carrito_tiene_productos(): void
    {
        $carrito = \App\Models\Carrito::find(1);
        
        // Verifica que el carrito existe
        $this->assertNotNull($carrito, "No se encontró un carrito con ID 1");
        
        // Verifica que el carrito tiene productos
        $this->assertTrue($carrito->productos->count() > 0, "El carrito no tiene productos");
        
        // Verifica específicamente que el producto con ID 1 está en el carrito
        $this->assertTrue($carrito->productos->contains('id', 1), 
            "El carrito no contiene el producto con ID 1");
        
        // Alternativa: verificar directamente en la tabla pivote
        $this->assertDatabaseHas('producto_carrito', [
            'carrito_id' => 1,
            'producto_id' => 1
        ]);
    }
}
