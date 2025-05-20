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
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_creacion');
            $table->dateTime('fecha_envio');
            $table->string('direccion_envio');
            $table->string('estado');
            $table->float('total');
            $table->string('user_dni');
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('user_dni')->references('dni')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};