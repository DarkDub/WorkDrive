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
        Schema::create('Clientes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('telefono', 20)->nullable();
            $table->string('direccion')->nullable();
            $table->string('nit', 20)->unique(); // Cambia 'nit' por 'nit' y agrega la restricción unique
            $table->string('codigo_postal', 20)->nullable();
            $table->string('estado', 1)->default('A');
            // Campos de auditoría
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            // Relaciones con otras tablas
            $table->foreignId('pais_id')->constrained()->onDelete('cascade');
            $table->foreignId('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
            $table->foreignId('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Clientes', function (Blueprint $table) {
            // Eliminar las restricciones de claves foráneas
            $table->dropForeign(['pais_id']);
            $table->dropForeign(['departamento_id']);
            $table->dropForeign(['municipio_id']);
        });

        // Eliminar la tabla Clientes
        Schema::dropIfExists('Clientes');
    }
};
