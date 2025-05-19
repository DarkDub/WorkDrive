<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\backend\TrabajadorController;
use App\Http\Controllers\backend\ClienteController;
use App\Http\Controllers\profesion;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\AutenticacionController;
use App\Http\Controllers\DatosTrabajadorController;
use App\Http\Controllers\ProfileController;
use App\Models\servicios;

// Página principal
Route::get('/r', function () {
    return view('trabajadores.registro2');
});
// Route::get('/', function () {
//     return view('pruebas.prueba2');
// });
Route::get('/p', function () {
    return view('pruebas.demos');
});
// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/b', function () {
    return view('pruebas.prueba2');
});
// Página principal personalizada
// Route::get('/prin', function () {
//     return view('components.principal');
// });
Route::middleware(['auth'])->group(function () {

    // todas tus rutas protegidas van aquí

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

    Route::post('/logout', [AutenticacionController::class, 'logout'])->name('logout');

    // Rutas para el registro


    // RUTA GENERAL DEL DASHBOARD (redirecciona según el rol si quieres)
    Route::middleware('auth')->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // RUTAS CON ROLES
    Route::middleware(['auth', 'Rol:cliente'])->group(function () {
        Route::get('/principal', [ClienteController::class, 'dashboard'])->middleware('Rol:cliente');
    });

    Route::get('/principal', [ClienteController::class, 'dashboard'])->name('cliente.index');


    Route::get('/trabajador', [TrabajadorController::class, 'dashboard'])->middleware('Rol:trabajador');

    Route::get('/trabajador', [TrabajadorController::class, 'dashboard'])->name('trabajador.index');

    // Route::middleware('auth')->post('/actualizar-ubicacion', [UbicacionController::class, 'actualizar'])->name('ubicacion.actualizar');

    // Route::post('/actualizar-ubicacion', [UbicacionController::class, 'actualizar'])->name('ubicacion.actualizar');
    // Route::post('/actualizar-ubicacion', [UbicacionController::class, 'actualizar'])->middleware('auth');
    Route::middleware('auth')->post('/actualizar-ubicacion', [UbicacionController::class, 'actualizar'])->name('ubicacion.actualizar');
    // web.php o api.php (según como manejes rutas)
    Route::get('/ubicaciones', [UbicacionController::class, 'listar'])->name('ubicaciones.listar');


    // RUTAS DE PERFIL
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

Route::get('/login', [AutenticacionController::class, 'create'])->name('login');
Route::post('/login', [AutenticacionController::class, 'store'])->name('login.store');
Route::get('/registro', [RegisterController::class, 'create'])->name('register');
Route::post('/registro', [RegisterController::class, 'registro'])->name('registro');
Route::get('/registro/trabajador/{registro_id}', [RegisterController::class, 'formularioTrabajador'])->name('registro.trabajador');
Route::get('/registro-trabajador', [DatosTrabajadorController::class, 'create'])->name('trabajador.create');
Route::post('/registro-trabajador', [DatosTrabajadorController::class, 'store'])->name('trabajador.registrar');



// Auth scaffolding
// require __DIR__ . '/auth.php';