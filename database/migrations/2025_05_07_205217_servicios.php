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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            // $table->string('telefono', 20)->nullable();
            $table->text('descripcion');
            $table->string('tarifa')->nullable();
            // Definición correcta de pago_id como clave foránea
            $table->foreignId('pago_id')->constrained('metodo_pago')->onDelete('cascade');
            $table->string('estado')->default('activo');
            // Relación con la tabla profesiones 
            $table->foreignId('labor_id')->constrained('profesiones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
