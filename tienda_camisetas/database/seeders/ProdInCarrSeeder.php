<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdInCarrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('producto_carrito')->insert([
            'carrito_id' => 1,
            'producto_id' => 1,
            'cantidad' => 5,
            'created_at' => now(), 
            'updated_at' => now(),
        ]);

        DB::table('producto_carrito')->insert([
            'carrito_id' => 2,
            'producto_id' => 1,
            'cantidad' => 2,
            'created_at' => now(), 
            'updated_at' => now(),
        ]);
    }
}
