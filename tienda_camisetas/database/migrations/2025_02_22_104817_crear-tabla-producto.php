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
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('talla');
            $table->float('precio');
            $table->integer('stock');
            $table->string('color');
            $table->string('temporada');
            $table->string('material');
            $table->integer('descuento');
            $table->string('imagen');

            // Relaciones con equipo y proveedor
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('proveedor_id');

            $table->timestamps();

            // Claves foráneas
            $table->foreign('equipo_id')->references('id')->on('equipo')->onDelete('cascade');
            $table->foreign('proveedor_id')->references('id')->on('proveedor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
