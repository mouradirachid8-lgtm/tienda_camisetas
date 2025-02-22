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
        Schema::create('producto-carrito', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrito_id');
            $table->unsignedBigInteger('producto_id');
            $table->integer('cantidad')->default(1); // Opcional: para almacenar la cantidad de productos en el carrito
            $table->timestamps();

            // Descomentar las siguientes lineas en caso de tener la tabla producto
            // $table->foreign('carrito_id')->references('id')->on('carrito')->onDelete('cascade');
            // $table->foreign('producto_id')->references('id')->on('producto')->onDelete('cascade');

            // $table->unique(['carrito_id', 'producto_id']); // Para evitar duplicados
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto-carrito');
    }
};
