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
            $table->text('fecha');
            $table->text('hora');
            $table->decimal('tarifa', 10, 2)->nullable();
            // Definición correcta de pago_id como clave foránea
            $table->foreignId('pago_id')->constrained('metodo_pago')->onDelete('cascade');
            $table->unsignedBigInteger('estado_id')->default(1);
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->unsignedBigInteger('trabajador_id')->nullable();
            $table->foreign('trabajador_id')->references('id')->on('registros')->onDelete('set null');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('labor_id')->constrained('profesiones')->onDelete('cascade');
            $table->decimal('latitud', 10, 7)->nullable();
            $table->decimal('longitud', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('servicios');
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropForeign(['trabajador_id']);
            $table->dropColumn('trabajador_id');
        });
    }
};
