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
        Schema::create('usuario', function (Blueprint $table) {
            $table->string('dni')->primary(); // Changed to lowercase to match reference
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email')->unique(); 
            $table->string('telefono');
            $table->string('pais');
            $table->string('localidad');
            $table->string('direccion');
            $table->string('modo_pago');
            $table->date('fecha_registrado'); 
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
        Schema::dropIfExists('usuario');
    }
};

?>
