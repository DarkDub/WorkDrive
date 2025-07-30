<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajador;
use App\Models\Pais;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $estado = $request->get('estado', 'All');

        $query = Trabajador::with(['pais', 'departamento', 'municipio', 'registro.rol', 'profesion'])
            ->whereHas('registro', function ($q) {
                $q->where('rol_id', 4); // ✅ Este es el filtro por rol (desde registros)
            });


        if ($estado !== 'All') {
            $query->where('estado', $estado);
        }

        $jobs = $query->get();

        return view('jobs.index', compact('jobs', 'estado'));
        //
    }

    public function actualizarEstado(Request $request, $id)
    {
        /* dd($request->all()); */
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->estado = $request->estado;
        $trabajador->save();

        return redirect()->back()->with('success', 'Estado actualizado correctamente');
    }

    public function Eliminados()
    {
        session(['mensaje' => 'Eliminar']);
        $jobs = Trabajador::with(['pais', 'departamento', 'municipio'])->where('estado', '*')->get();
        return view('jobs.eliminados', compact('jobs'));
        //
    }

    public function cambiarEstado(Trabajador $jobs, $estado)
    {

        $jobs->estado = $estado;
        $jobs->save();
        $ruta = $estado == 'A' ? 'jobs.eliminados' : 'jobs.index';
        return redirect()->route($ruta);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = Pais::all();
        $departamentos = DB::table('departamentos')->get();
        $municipios = DB::table('municipios')->get();

        return view('jobs.create', compact('paises', 'departamentos', 'municipios'));
        //
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required|email',
            'pais_id' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
        ]);
        // dd($request->all()); 
        Trabajador::create($request->all());

        return redirect()->route('trabajadores.index')->with('toast_success', 'Proveedor registrado correctamente');
 */
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
