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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('email')->unique();
            
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->decimal('latitud', 10, 7)->nullable();
            $table->decimal('longitud', 10, 7)->nullable();
            $table->unsignedBigInteger('rol_id');
            // $table->unsignedInteger('id_dp1')->nullable();
            $table->timestamp('created_at')->useCurrent(); // Cambia 'create_at' por 'created_at'
            $table->timestamp('updated_at')->useCurrent(); // Cambia 'update_at' por 'updated_at'
            // Definir claves foraneas
            $table->foreign('rol_id')->references('id')->on('rols')->onDelete('cascade');
            // $table->foreign('id_dp1')->references('id_detalle_parametro')->on('detalle_parametros')->onDelete('cascade');
            $table->string('codigo_postal')->nullable();
            $table->foreignId('pais_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('departamento_id')->nullable()->references('id')->on('departamentos')->onDelete('cascade');
            $table->foreignId('municipio_id')->nullable()->references('id')->on('municipios')->onDelete('cascade');
        });

        // Schema::create('usuarios', function (Blueprint $table) {
        //     $table->increments('id_usuario');
        //     $table->unsignedInteger('id_registro');
        //     $table->string('usuario', 40);
        //     $table->string('password');
        //     $table->timestamps();

        //     // Definir claves foraneas
        //     $table->foreign('id_registro1')->references('id_registro')->on('registros')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

         Schema::table('registros', function (Blueprint $table) {
            // Eliminar las restricciones de claves foráneas
            $table->dropForeign(['pais_id']);
            $table->dropForeign(['departamento_id']);
            $table->dropForeign(['municipio_id']);
        });
        Schema::dropIfExists('registros');
    }
};
