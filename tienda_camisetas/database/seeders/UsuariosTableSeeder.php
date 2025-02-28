<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'DNI' => '80464283C',
                'nombre' => 'Cristiano',
                'apellidos' => 'Ronaldo Dos Santos Aveiro',
                'email' => 'cr7_elbicho7@gmail.com',
                'telefono' => '612270152',
                'pais' => 'Portugal',
                'localidad' => 'Madeira',
                'direccion' => 'Calle Mayor, 7',
                'modo_pago' => 'Tarjeta de crédito',
                'fecha_registrado' => Carbon::now()->subDays(30)->toDateString(),
                'puntos_fidelidad' => 100,
                'admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'DNI' => '87654321B',
                'nombre' => 'Ana',
                'apellidos' => 'Draghia López',
                'email' => 'analopez_draghia9@gmail.com',
                'telefono' => '987654321',
                'pais' => 'Rumania',
                'localidad' => 'Bucarest',
                'direccion' => 'Avenida Diagonal, 9999',
                'modo_pago' => 'PayPal',
                'fecha_registrado' => Carbon::now()->subDays(15)->toDateString(),
                'puntos_fidelidad' => 0,
                'admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'DNI' => '11223344C',
                'nombre' => 'Carlos',
                'apellidos' => 'Martínez Ruiz',
                'email' => 'carlos.martinez@example.com',
                'telefono' => '654321987',
                'pais' => 'México',
                'localidad' => 'CDMX',
                'direccion' => 'Reforma 200',
                'modo_pago' => 'Efectivo',
                'fecha_registrado' => Carbon::now()->subDays(5)->toDateString(),
                'puntos_fidelidad' => 50,
                'admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

?>