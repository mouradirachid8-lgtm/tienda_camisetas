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
        Schema::create('users', function (Blueprint $table) {
            $table->string('dni')->primary();
            $table->string('nombre');
            $table->string('apellidos')->nullable();
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->string('pais')->nullable();
            $table->string('localidad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('modo_pago')->nullable();
            $table->string('password');
            $table->integer('puntos_fidelidad')->default(0);
            $table->boolean('admin')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
