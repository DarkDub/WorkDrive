<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UbicacionController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/actualizar-ubicacion', [UbicacionController::class, 'actualizar'])->name('ubicacion.actualizar');
    Route::get('/usuarios-ubicacion', [UbicacionController::class, 'listar'])->name('ubicacion.listar');
});
