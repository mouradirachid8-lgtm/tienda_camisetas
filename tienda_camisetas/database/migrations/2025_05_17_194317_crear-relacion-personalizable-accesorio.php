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
        Schema::create('personalizable_accesorio', function (Blueprint $table) {
            $table->unsignedBigInteger('personalizable_id');
            $table->unsignedBigInteger('accesorio_id');
            $table->float('precio')->nullable();
            $table->timestamps();
            
            // Foreign keys - Corregido para apuntar a 'accesorio' en lugar de 'accesorios'
            $table->foreign('personalizable_id')->references('id')->on('personalizable')->onDelete('cascade');
            $table->foreign('accesorio_id')->references('id')->on('accesorio')->onDelete('cascade');
            
            // Composite primary key
            $table->primary(['personalizable_id', 'accesorio_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalizable_accesorio');
    }
};