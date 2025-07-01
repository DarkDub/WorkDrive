<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Auth\LoginRequest; // ✔️ correcto
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Rol;

class AutenticacionController extends Controller
{

    public function create(): View
    {
        return view('auth.login'); // formulario login
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = User::with('rol')->find(Auth::id()); // carga la relación directamente
        $rolNombre = $user->rol?->nombre;
        // dd([
        //     'user_id' => $user->id,
        //     'rol_id' => $user->rol_id,
        //     'rol_nombre' => $rolNombre,
        // ]);

        if ($rolNombre === 'cliente') {
            return redirect()->route('cliente.index');
        } elseif ($rolNombre === 'trabajador') {
            return redirect()->route('trabajador.index');
        } else {

            return redirect()->route('dashboard');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
