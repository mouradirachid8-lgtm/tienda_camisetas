<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('producto')->insert([
            [
                'nombre' => 'Camiseta Oficial FC Barcelona',
                'talla' => 'M',
                'precio' => 89.99,
                'stock' => 50,
                'color' => 'Azul y Rojo',
                'temporada' => '2023-2024',
                'material' => 'Poliéster',
                'descuento' => 10,
                'imagen' => 'barcelona.jpg',
                'equipo_id' => 1,
                'proveedor_id' => 1,
            ],
            [
                'nombre' => 'Camiseta Oficial Real Madrid',
                'talla' => 'L',
                'precio' => 95.50,
                'stock' => 30,
                'color' => 'Blanco',
                'temporada' => '2023-2024',
                'material' => 'Poliéster',
                'descuento' => 5,
                'imagen' => 'realmadrid.jpg',
                'equipo_id' => 2,
                'proveedor_id' => 2,
            ]
        ]);
    }
}
