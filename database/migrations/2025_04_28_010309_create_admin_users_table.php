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
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id(); // Creación de la columna id (clave primaria)
            $table->string('name', 100); // Limitar el nombre a 100 caracteres
            $table->string('email', 255)->unique(); // Asegurarse de que el email sea único
            $table->string('password'); // No se especifica límite ya que las contraseñas varían
            $table->rememberToken(); // Campo de token para recordar al usuario
            $table->string('estado', 1)->default('A');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            // // Definición de la clave foránea
            $table->foreignId('role_id')->constrained('rols')->onDelete('cascade');
            // $table->timestamps(); // Campos de timestamps (created_at, updated_at)

            // $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     
        Schema::dropIfExists('admin_users'); // Elimina la tabla en caso de rollback
    }
};
