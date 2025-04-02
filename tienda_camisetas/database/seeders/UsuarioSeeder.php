<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuario')->insert([
            [
                'DNI' => '80464283C',
                'nombre' => 'Admin',
                'apellidos' => 'Administrador',
                'email' => 'admin7@gmail.com',
                'telefono' => '612270152',
                'pais' => 'Portugal',
                'localidad' => 'Madeira',
                'direccion' => 'Calle Mayor, 7',
                'modo_pago' => 'Tarjeta de crédito',
                'fecha_registrado' => Carbon::now()->subDays(30)->toDateString(),
                'puntos_fidelidad' => 100,
                'password' => Hash::make('admin'), // 🔹 Cifra la contraseña aquí
                'admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'DNI' => '11223344C',
                'nombre' => 'user1',
                'apellidos' => 'usuario',
                'email' => 'user1@example.com',
                'telefono' => '654321987',
                'pais' => 'México',
                'localidad' => 'CDMX',
                'direccion' => 'Reforma 200',
                'modo_pago' => 'Efectivo',
                'fecha_registrado' => Carbon::now()->subDays(5)->toDateString(),
                'puntos_fidelidad' => 50,
                'password' => Hash::make('user1'), // 🔹 Cifra la contraseña aquí
                'admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
