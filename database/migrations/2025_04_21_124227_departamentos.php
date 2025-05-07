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
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('dpto_codigo', 50);
            $table->string('nombre');
            $table->foreignId('pais_id')->constrained()->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent(); // Cambia 'create_at' por 'created_at'
            $table->timestamp('updated_at')->useCurrent(); // Cambia 'update_at' por 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
