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
        $teams = [
            ['carpeta' => 'arsenal', 'color' => 'rojo y blanco', 'name' => 'Arsenal', 'id' => 8],
            ['carpeta' => 'barca', 'color' => 'azul y rojo', 'name' => 'FC Barcelona', 'id' => 2],
            ['carpeta' => 'madrid', 'color' => 'blanco', 'name' => 'Real Madrid', 'id' => 1],
            ['carpeta' => 'av', 'color' => 'morado y azul', 'name' => 'Aston Villa', 'id' => 3],
            ['carpeta' => 'bvb', 'color' => 'amarillo y negro', 'name' => 'Dortmund', 'id' => 7],
            ['carpeta' => 'bayern', 'color' => 'rojo y blanco', 'name' => 'Bayern Munchen', 'id' => 4],
            ['carpeta' => 'psg', 'color' => 'azul', 'name' => 'PSG', 'id' => 6],
            ['carpeta' => 'inter', 'color' => 'azul y negro', 'name' => 'Inter Milan', 'id' => 5],
        ];

        // Crear el array con los valores
        $materiales = [
            "Algodón",
            "Poliéster",
            "Nylon",
            "Elastano",
            "Rayón"
        ];

        foreach ($teams as ['carpeta' => $c, 'color' => $color, 'name' => $team, 'id' => $id]) {
            for ($i = 1; $i <= 10; $i++) {
                $year1 = 2025 - $i;
                $year2 = $year1 + 1;
                $temporada = "$year1-$year2";

                DB::table('producto')->insert([
                    'nombre' => "Camiseta $team",
                    'precio' => rand(50, 150),
                    'stock' => rand(10, 100),
                    'color' => $color,
                    'temporada' => $temporada,
                    'material' => $materiales[array_rand($materiales)],
                    'imagen' => "images/$c/$c$i.jpg",
                    'talla_id' => 1,
                    'equipo_id' => $id,
                    'proveedor_id' => rand(1, 8),
                    'created_at' => now(),
                    'updated_at' => now(),
                    // Método para generar descuentos más realistas
                    'descuento' => (rand(1, 100) <= 70) ? rand(0, 15) : rand(20, 50), // 70% probabilidad de 0-15%, 30% probabilidad de 20-50%
                ]);
            }
        }
    }
}
