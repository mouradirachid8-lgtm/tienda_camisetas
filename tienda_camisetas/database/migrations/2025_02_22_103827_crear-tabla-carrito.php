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
            $table->id();
            $table->string('user_dni'); // Changed to string to match the 'dni' column in 'usuarios'
            $table->float('precio_total')->default(0);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_dni')->references('dni')->on('users');
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
