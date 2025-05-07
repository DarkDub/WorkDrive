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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('nit', 20)->unique(); // Cambia 'nit' por 'nit' y agrega la restricción unique
            $table->string('telefono', 20); // Cambia 'telefono' por 'telefono' y permite valores nulos 
            $table->string('direccion', 100); // Cambia 'direccion' por 'direccion' y permite valores nulos 
            $table->string('correo', 50)->unique(); // Cambia 'email' por 'email' y permite valores nulos 
            $table->string('estado', 1)->default('A'); // A: activo, I: inactivo 
            $table->unsignedBigInteger('pais_id'); // Cambia 'pais_id' por 'pais_id' y define el tipo de dato como unsignedBigInteger
            $table->unsignedBigInteger('departamento_id'); // Cambia 'departamento_id' por 'departamento_id' y define el tipo de dato como unsignedBigInteger
            $table->unsignedBigInteger('municipio_id'); // Cambia 'municipio_id' por 'municipio_id' y define el tipo de dato como unsignedBigInteger 
            $table->timestamp('created_at')->useCurrent(); // Cambia 'create_at' por 'created_at'
            $table->timestamp('updated_at')->useCurrent(); // Cambia 'update_at' por 'updated_at'

            // Definir relaciones 
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
        Schema::dropIfExists('proveedores');
    }
};
