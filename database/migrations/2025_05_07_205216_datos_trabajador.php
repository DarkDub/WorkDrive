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
           Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
        });
        Schema::create('datos_trabajador', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('numero_documento')->unique();
            $table->text('hoja_vida')->nullable();
            $table->text('foto_documento')->nullable();
            $table->string('estado', 1)->default('A');
            $table->foreignId('tipo_documento')->constrained('tipo_documentos')->onDelete('cascade');
            $table->foreignId('registro_id')->constrained('registros')->onDelete('cascade');
            $table->foreignId('profesion_id')->constrained('profesiones')->onDelete('cascade');
            $table->timestamps();

            // Llave foránea con tabla profesiones


        });

     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_trabajador');
        Schema::dropIfExists('tipo_documentos');
    }
};
