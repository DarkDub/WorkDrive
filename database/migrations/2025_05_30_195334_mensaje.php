<?php

use Illuminate\Database\Eloquent\Scope;
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
        Schema::create('mensajes', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id'); // quien envía el mensaje
    $table->unsignedBigInteger('trabajador_id');
    $table->unsignedBigInteger('cliente_id');
    $table->text('contenido');
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('registros')->onDelete('cascade');
    $table->foreign('trabajador_id')->references('id')->on('registros')->onDelete('cascade');
    $table->foreign('cliente_id')->references('id')->on('registros')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
