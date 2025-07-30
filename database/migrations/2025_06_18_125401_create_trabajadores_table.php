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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registro_id');
            $table->string('tipo_documento'); 
            $table->string('numero_documento')->unique();
            $table->string('profesion_id');
            $table->string('hoja_vida');
            $table->string('foto_documento');
            $table->string('estado', 1)->default('A'); // A: activo, I: inactivo 
            $table->unsignedBigInteger('pais_id'); // Cambia 'pais_id' por 'pais_id' y define el tipo de dato como unsignedBigInteger
            $table->unsignedBigInteger('departamento_id'); // Cambia 'departamento_id' por 'departamento_id' y define el tipo de dato como unsignedBigInteger
            $table->unsignedBigInteger('municipio_id'); // Cambia 'municipio_id' por 'municipio_id
            $table->timestamps();

            // Definir relaciones 
            $table->foreign('registro_id')->references('id')->on('registros')->onDelete('cascade'); 
            $table->foreign('pais_id')->references('id')->on('pais')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadores');
    }
};
