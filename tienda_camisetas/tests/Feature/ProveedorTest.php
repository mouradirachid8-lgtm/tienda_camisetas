<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProveedorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_se_puede_crear_proveedor(): void
    {
        $this->assertDatabaseHas('proveedor', [
            'id' => '1',
            'nombre'=> 'Nike',
        ]);
    }
}
