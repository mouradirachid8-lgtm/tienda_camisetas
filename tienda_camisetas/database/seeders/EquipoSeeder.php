<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // eliminar para que funcione seeder
        DB::table('equipo')->delete();

        DB::table('equipo')->insert([
            ['id' => 1, 'nombre' => 'FC Barcelona', 'pais' => 'España'],
            ['id' => 2, 'nombre' => 'Real Madrid', 'pais' => 'España'],
        ]);
    }
}
