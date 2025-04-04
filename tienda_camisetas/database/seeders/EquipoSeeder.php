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
            ['nombre' => 'Real Madrid', 'pais' => 'España', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Barcelona', 'pais' => 'España', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Aston Villa', 'pais' => 'Inglaterra', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Bayern Múnich', 'pais' => 'Alemania', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Inter Milan', 'pais' => 'Italia', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'PSG', 'pais' => 'Francia', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Dortmund', 'pais' => 'Alemania', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Arsenal', 'pais' => 'Inglaterra', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
