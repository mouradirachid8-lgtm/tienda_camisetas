<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //para que seeder funcione sin errores de clave duplicada
        DB::table('proveedor')->insert([
            ['nombre' => 'Nike', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Adidas', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Puma', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Under Armour', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'New Balance', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Kappa', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Umbro', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Reebok', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
