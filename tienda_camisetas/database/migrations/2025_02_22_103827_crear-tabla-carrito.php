<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carrito', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('user_dni'); // Pertenece al ID de un usuario
            $table->timestamps();

            // En tener la tabla de usuario, descomentar esta línea
            // $table->foreign('user_id')->references('dni')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};
