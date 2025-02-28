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
        DB::table('proveedor')->updateOrInsert(
            ['id' => 1], ['nombre' => 'Nike']
        );

        DB::table('proveedor')->updateOrInsert(
            ['id' => 2], ['nombre' => 'Adidas']
        );
    }
}
