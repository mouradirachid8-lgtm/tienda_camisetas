<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('talla')->insert([
            ['nombre' => 'XS', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'S', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'M', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'XL', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'XXL', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
