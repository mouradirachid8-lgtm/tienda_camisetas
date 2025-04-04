<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EquipoSeeder::class,
            ProveedorSeeder::class,
            TallaSeeder::class,
            ProductoSeeder::class,
            UsuarioSeeder::class,
            CarritoSeeder::class,
            ProdInCarrSeeder::class,
        ]);
    }
}
