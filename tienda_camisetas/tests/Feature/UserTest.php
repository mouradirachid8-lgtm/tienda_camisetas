<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase; // Asegúrate de que esto está activo
    
    public function test_usuario_puede_ser_creado(): void
    {   
        // Verifica que el usuario existe en la tabla 'usuarios'
        $this->assertDatabaseHas('usuarios', [
            'dni' => '11223344C',
            'nombre' => 'Carlos',
            'apellidos' => 'Martínez Ruiz',
            'email' => 'carlos.martinez@example.com',
            'telefono' => '654321987',
            'pais' => 'México',
            'localidad' => 'CDMX',
            'direccion' => 'Reforma 200',
            'modo_pago' => 'Efectivo',
        ]);
    }
}
