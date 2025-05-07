<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rol = Rol::with('rolPadre')->where('estado', 'A')->get();
        return view('roles.roles', compact('rol'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'padre' => 'required',
        ]);

        Rol::create($request->all());

        // // // $rol = new Rol();
        // // // $rol->nombre = $request->nombre;
        // // // $rol->descripcion = $request->descripcion;
        // // // $rol->padre = $request->rolPadre;
        // // // $rol->save();
        return redirect()->route('rol.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        $rol = Rol::with('rolPadre')->where('estado', '*')->get();
        return view('roles.rolesEliminados', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        $roles = Rol::all();
        return view('roles.editar', compact('rol', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'padre' => 'required',
        ]);

        $rol->update($request->all()); // ✅ Esto es correcto


        return redirect()->route('rol.index')->with('success', 'Rol creado exitosamente');
    }
    public function CambiarEstado(Rol $rol, $estado)
    {
        $rol->estado = $estado;
        $ruta = $estado == 'A' ? 'roles.Eliminados' : 'rol.index';
        $rol->save();

        return redirect()->route($ruta);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
    
    }
}
