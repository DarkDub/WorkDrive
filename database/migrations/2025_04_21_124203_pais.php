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
        Schema::create('pais', function (Blueprint $table) {
            $table->id();
            $table->string('pais_codigo', 50);
            $table->string('nombre');
            $table->timestamp('created_at')->useCurrent(); // Cambia 'create_at' por 'created_at'
            $table->timestamp('updated_at')->useCurrent(); // Cambia 'update_at' por 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pais');
    }
};
