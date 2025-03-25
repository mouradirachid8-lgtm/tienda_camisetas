<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EquipoTest extends TestCase
{
    public function test_se_puede_crear_equipo(): void
    {
        $this->assertDatabaseHas('equipo', [
            'id' => '2',
            'nombre'=> 'Real Madrid',
            'pais'=> 'España',
        ]);
    }
}
