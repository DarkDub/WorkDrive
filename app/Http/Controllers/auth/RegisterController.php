<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol; // Asegúrate de tener el modelo Rol
use App\Models\Registro; 
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rule;



class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function create(): View
    {
        return view('auth.registro'); // Asegúrate de tener esta vista
    }

    public function registro(Request $request)
    {
        /* dd($request->all()); */
       // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',  // Validación para teléfono
            'email' => 'required|string|email|max:255|unique:registros',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'userRole' => ['required', Rule::in(['trabajador', 'cliente'])],
        ]);

        $rol = Rol::where('nombre', $request->userRole)->first();

            if (!$rol) {
        return back()->withErrors(['userRole' => 'Rol no válido.']);
    }

        // Crear el registro en la tabla 'registros'
        $registro = Registro::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Encriptar la contraseña
            'rol_id' =>$rol->id,
        ]);

        $user = User::create([
        'name' => $request->nombre,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'rol_id' => $registro->rol_id,
        'registro_id' => $registro->id, // usa el id correcto

        ]);

        Auth::login($user);

        return redirect()->route('login');

    }
}