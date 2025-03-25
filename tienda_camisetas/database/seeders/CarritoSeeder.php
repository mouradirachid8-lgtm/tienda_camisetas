<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carrito')->insert([
            'user_dni' => '11223344C',
            'created_at' => now(), 
            'updated_at' => now(),
        ]);

        DB::table('carrito')->insert([
            'user_dni' => '80464283C',
            'created_at' => now(), 
            'updated_at' => now(),
        ]);
    }
}
