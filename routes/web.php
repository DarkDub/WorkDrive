<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\profesion;
use App\Http\Controllers\ServiciosController;
use App\Models\servicios;

// Página principal
Route::get('/r', function () {
    return view('trabajadores.registro2');
});
// Route::get('/', function () {
//     return view('pruebas.prueba2');
// });
Route::get('/p', function () {
    return view('pruebas.prueba');
});
// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/', function () {
    return view('pruebas.button');
});
Route::get('/b', function () {
    return view('pruebas.prueba2');
});
// Página principal personalizada
// Route::get('/prin', function () {
//     return view('components.principal');
// });

// Rutas de Roles
Route::resource('rol', RolController::class);
Route::get('/rolesEliminados', [RolController::class, 'show'])->name('roles.Eliminados');
Route::put('/rolcambiarEstado/{rol}/{estado}', [RolController::class, 'CambiarEstado'])->name('rol.estado');

// Rutas de Proveedores
Route::resource('prove', ProveedorController::class);
Route::get('/prove/eliminados', [ProveedorController::class, 'Eliminados'])->name('proveedores.eliminados');
Route::put('/provecambiarEstado/{prove}/{estado}', [ProveedorController::class, 'cambiarEstado'])->name('proveedores.cambiarEstado');

// Rutas de Clientes
Route::resource('clientes', ClientesController::class);
Route::get('/eliminados', [ClientesController::class, 'Eliminados'])->name('clientes.eliminados');
Route::put('/clientecambiarEstado/{cliente}/{estado}', [ClientesController::class, 'cambiarEstado'])->name('clientes.cambiarEstado');

Route::resource('admin_user', AdminUserController::class);
Route::resource('profesiones', profesion::class);
Route::get('/solicitar-servicio/{labor}', [ServiciosController::class, 'create'])->name('servicio.create');
Route::resource('servicios', ServiciosController::class);
