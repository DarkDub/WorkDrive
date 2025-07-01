<?php

namespace App\Http\Controllers;
use App\Models\Permisos;
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    public function index()
    {
        $permisos = Permisos::with('rolPadre')->where('estado', 'A')->get();
        return view('permisos.index', compact('permisos'));
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
            'descripcion' => 'required'
        ]);

        Permisos::create($request->all());

        return redirect()->route('permisos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    $permisos = Permisos::where('estado', '*')->get();  // Asigna el resultado a $permisos
    return view('permisos.eliminados', compact('permisos'));
    }

    // public function show(Permisos $permisos)
    // {
    //     $permisos ->where('estado', '*')->get();
    //     return view('permisos.eliminados', compact('permisos'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permisos $permiso)
    {
        $permisos = Permisos::all();  // trae todos los permisos
        return view('permisos.editar', compact('permiso', 'permisos'));
    }

    // public function edit(Permisos $permiso)
    // {
    // return view('permisos.editar', compact('permiso'));
    // }


    public function update(Request $request, Permisos $permiso)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $permiso->update($request->only('nombre', 'descripcion'));

        return redirect()->route('permisos.index')->with('success', 'Permiso actualizado exitosamente');
    }


    public function cambiarEstado(Permisos $permisos, $estado)
    {
        $permisos->estado = $estado;
        $ruta = $estado == 'A' ? 'permisos.eliminados' : 'permisos.index';
        $permisos->save();

        return redirect()->route($ruta);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permisos $permisos)
    {
    
    }
}
