<?php

use App\Http\Controllers\AccionesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\backend\TrabajadorController;
use App\Http\Controllers\backend\ClienteController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\AutenticacionController;
use App\Http\Controllers\DatosTrabajadorController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\ConfiguracionesController;
use App\Http\Controllers\profesion;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// RUTAS PÚBLICAS
Route::get('/test-mail', function () {
    $user = User::first();
    if (!$user) {
        return 'No hay usuarios para probar.';
    }
    $user->sendEmailVerificationNotification();
    return 'Correo de verificación enviado.';
});
// 📨 Muestra la vista donde se avisa que se debe verificar el correo
Route::get('/email/verify', function () {
    return view('auth.verify-email'); // Esta vista la crearemos si no existe
})->middleware('auth')->name('verification.notice');

// ✅ Ruta que maneja el clic en el enlace del email de verificación
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Marca el correo como verificado

    $user = Auth::user();

    // Verifica el rol para redirigir
    if ($user->rol->nombre === 'cliente') {
        return redirect()->route('cliente.index')->with('status', 'Correo verificado correctamente. Ahora puedes iniciar sesión.');
    } elseif ($user->rol->nombre === 'trabajador') {
        return redirect()->route('trabajador.index')->with('status', 'Correo verificado correctamente. Ahora puedes iniciar sesión.');
    }

    // Por defecto redirige al login
    return redirect()->route('login')->with('status', 'Correo verificado correctamente. Ahora puedes iniciar sesión.');
})->middleware(['auth', 'signed'])->name('verification.verify');

// 🔁 Ruta para reenviar el correo de verificación
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Se ha enviado un nuevo enlace de verificación.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', fn() => view('auth.login'));
Route::get('/login', [AutenticacionController::class, 'create'])->name('login');
Route::post('/login', [AutenticacionController::class, 'store'])->name('login.store');

Route::get('/registro', [RegisterController::class, 'create'])->name('register');
Route::post('/registro', [RegisterController::class, 'registro'])->name('registro');
Route::get('/registro/trabajador/{registro_id}', [RegisterController::class, 'formularioTrabajador'])->name('registro.trabajador');
Route::get('/registro-trabajador', [DatosTrabajadorController::class, 'create'])->name('trabajador.create');
Route::post('/registro-trabajador', [DatosTrabajadorController::class, 'store'])->name('trabajador.registrar');

// RUTAS DE PRUEBA (sólo usar en desarrollo)
if (app()->environment('local')) {
    Route::get('/r', fn() => view('trabajadores.registro2'));
    Route::get('/p', fn() => view('pruebas.demos'));
    Route::get('/b', fn() => view('pruebas.prueba2'));
}

// RUTAS PROTEGIDAS CON AUTENTICACIÓN
Route::middleware(['auth'])->group(function () {

    Route::get('/error/404', function () {
        return view('errors.404');
    })->name('errors.404');

    // Logout
    Route::post('/logout', [AutenticacionController::class, 'logout'])->name('logout');

    // Dashboard general
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // RUTAS PARA ADMINISTRADOR
    Route::middleware('Rol:SuperAdministrador')->group(function () {
        // Roles
        Route::resource('rol', RolController::class);
        Route::get('/rolesEliminados', [RolController::class, 'show'])->name('roles.Eliminados');
        Route::put('/rolcambiarEstado/{rol}/{estado}', [RolController::class, 'CambiarEstado'])->name('rol.estado');

        // Proveedores
        Route::resource('prove', ProveedorController::class);
        Route::get('/prove/eliminados', [ProveedorController::class, 'Eliminados'])->name('proveedores.eliminados');
        Route::put('/provecambiarEstado/{prove}/{estado}', [ProveedorController::class, 'cambiarEstado'])->name('proveedores.cambiarEstado');

        // Clientes
        Route::resource('clientes', ClientesController::class);
        Route::get('/eliminados', [ClientesController::class, 'Eliminados'])->name('clientes.eliminados');
        Route::put('/clientecambiarEstado/{cliente}/{estado}', [ClientesController::class, 'cambiarEstado'])->name('clientes.cambiarEstado');

        // Admin usuarios y profesiones
        Route::resource('admin_user', AdminUserController::class);
        Route::resource('profesiones', profesion::class);

        // Servicios
        Route::get('/solicitar-servicio/{labor}', [ServiciosController::class, 'create'])->name('servicio.create');
        Route::resource('servicios', ServiciosController::class);

        Route::resource('permisos', PermisosController::class);
        Route::get('/Permisoseliminados', [PermisosController::class, 'show'])->name('permisos.eliminados');
        Route::put('/permisoscambiarEstado/{permisos}/{estado}', [PermisosController::class, 'cambiarEstado'])->name('permisos.cambiarEstado');

        //Rutas de acciones
        Route::resource('acciones', AccionesController::class);
        // Route::get('/Permisoseliminados', [PermisosController::class, 'show'])->name('permisos.eliminados');
        // Route::put('/permisoscambiarEstado/{permisos}/{estado}', [PermisosController::class, 'cambiarEstado'])->name('permisos.cambiarEstado');

        //Rutas de configuracion
        Route::resource('configuraciones', ConfiguracionesController::class);
        // Route::get('/Permisoseliminados', [PermisosController::class, 'show'])->name('permisos.eliminados');
        // Route::put('/permisoscambiarEstado/{permisos}/{estado}', [PermisosController::class, 'cambiarEstado'])->name('permisos.cambiarEstado');


    });

    // RUTAS PARA CLIENTES
    Route::middleware(['auth', 'verified', 'Rol:cliente'])->group(function () {
        Route::get('/principal', [ClienteController::class, 'dashboard'])->name('cliente.index');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile-update', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/solicitar-servicio/{labor}', [ServiciosController::class, 'create'])->name('servicio.create');
        Route::resource('servicios', ServiciosController::class);
    });

    // RUTAS PARA TRABAJADORES
    Route::middleware(['auth', 'verified', 'Rol:trabajador'])->group(function () {
        Route::get('/trabajador', [TrabajadorController::class, 'dashboard'])->name('trabajador.index');
    });

    // Rutas de ubicación (disponibles para cualquier autenticado)
    Route::post('/actualizar-ubicacion', [UbicacionController::class, 'actualizar'])->name('ubicacion.actualizar');
    Route::get('/ubicaciones', [UbicacionController::class, 'listar'])->name('ubicaciones.listar');
});
Route::get('/login', [AutenticacionController::class, 'create'])->name('login'); // Mostrar formulario login
Route::post('/login', [AutenticacionController::class, 'store'])->name('login.store'); // Procesar login

// LOGOUT (protegido por auth)
