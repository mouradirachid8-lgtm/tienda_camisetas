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
        // Primero agregamos la relación con pedido si no existe
        if (!Schema::hasColumn('carrito', 'pedido_id')) {
            Schema::table('carrito', function (Blueprint $table) {
                $table->unsignedBigInteger('pedido_id')->nullable();
                $table->foreign('pedido_id')->references('id')->on('pedido')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminamos la columna si existe
        if (Schema::hasColumn('carrito', 'pedido_id')) {
            Schema::table('carrito', function (Blueprint $table) {
                $table->dropForeign(['pedido_id']);
                $table->dropColumn('pedido_id');
            });
        }
    }
};