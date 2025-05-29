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
    return view('emails.verify-email');
});

route::get('/v', function () {
    return view('emails.verify-email'); // Esta vista la crearemos si no existe
});

route::get('/ve', function () {
    return view('emails.verify-email-custom'); // Esta vista la crearemos si no existe
});
Route::get('/email/verify', function () {
    return view('emails.verify-email'); // Esta vista la crearemos si no existe
})->middleware('auth')->name('verification.notice');
Route::get('/verificado', function () {
    return view('emails.verificado'); // Esta vista la crearemos si no existe
})->middleware('auth')->name('verification.verificado');

Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    // Buscar el usuario
    $user = User::findOrFail($id);

    // Verificar que el hash corresponde al email del usuario
    if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403, 'El enlace de verificación no es válido.');
    }

    // Marcar el email como verificado si no lo está
    if (! $user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
    }

    
    Auth::login($user);

    return redirect()->route('verification.verificado')->with('message', '¡Tu correo ha sido verificado con éxito!');

})->middleware(['signed'])->name('verification.verify');

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
        //  Route::get('/servicios/mis-solicitudes', [ServiciosController::class, 'misSolicitudes'])->name('servicios.misSolicitudes');

Route::get('/servicios/check-acceptance/{id}', [ServiciosController::class, 'checkAcceptance']);
Route::post('/servicios/update-status/{id}', [ServiciosController::class, 'updateStatus']);

        Route::resource('servicios', ServiciosController::class);

       
    });

    // RUTAS PARA TRABAJADORES
    Route::middleware(['auth', 'verified', 'Rol:trabajador'])->group(function () {
        Route::get('/trabajador', [TrabajadorController::class, 'dashboard'])->name('trabajador.index');

        Route::post('/servicio/{id}/aceptar', [ServiciosController::class, 'aceptar'])->name('servicio.aceptar');

        Route::get('/solicitudes', [TrabajadorController::class, 'solicitudes'])->name('solicitudes.estado');
        Route::get('/solicitudes/{id}', [TrabajadorController::class, 'solicitudDetalles'])->name('solicitudes.detalle');


    });

    // Rutas de ubicación (disponibles para cualquier autenticado)
    Route::post('/actualizar-ubicacion', [UbicacionController::class, 'actualizar'])->name('ubicacion.actualizar');
    Route::get('/ubicaciones', [UbicacionController::class, 'listar'])->name('ubicaciones.listar');
});
