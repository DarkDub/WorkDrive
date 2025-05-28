<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $registro = $user->registro;

        $municipios = Municipio::all();
        $departamentos = Departamento::all();
        $paises = Pais::all();

        return view('front.clients.profile', compact('user', 'registro', 'paises', 'municipios', 'departamentos'));
    }

    public function edit()
    {
        $user = Auth::user();
        $registro = $user->registro;

        $municipios = Municipio::all();
        $departamentos = Departamento::all();
        $paises = Pais::all();

        return view('front.clients.editProfile', compact('user', 'registro', 'paises', 'municipios', 'departamentos'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $registro = $user->registro;

        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            //'email' => 'required|email|max:255|unique:users,email,' . $user->id, // El email está deshabilitado en el form
            'telefono' => 'required|string|max:15',
            'pais_id' => 'required|integer',
            'departamento_id' => 'required|integer',
            'municipio_id' => 'required|integer',
            'codigo_postal' => 'required|string|max:15',
            'avatar' => 'nullable|image|max:3072', // 3MB
        ]);

        // Actualizar datos en Registro
        $registro->update([
            'nombre' => $request->nombres,
            'apellido' => $request->apellidos,
            'telefono' => $request->telefono,
            'pais_id' => $request->pais_id,
            'departamento_id' => $request->departamento_id,
            'municipio_id' => $request->municipio_id,
            'codigo_postal' => $request->codigo_postal,
        ]);

        // Manejar avatar
        if ($request->hasFile('avatar')) {
            // Eliminar imagen anterior si existe
            if ($registro->avatar && Storage::disk('public')->exists($registro->avatar)) {
                Storage::disk('public')->delete($registro->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $registro->avatar = $avatarPath;
            $registro->save();
        }

        // Opcional: actualizar nombre del usuario (aunque email está disabled)
        $user->name = $request->nombres;
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Perfil actualizado correctamente');
    }
}
