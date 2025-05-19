<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;
/* use Yajra\DataTables\DataTables;  */

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prove = Proveedor::with(['pais', 'departamento', 'municipio'])
            ->where('estado', 'A')
            ->get();

        return view('proveedores.index', compact('prove'));
        //
    }

    public function Eliminados()
    {
        session(['mensaje' => 'Eliminar']);
        $prove = Proveedor::with(['pais', 'departamento', 'municipio'])->where('estado', '*')->get();
        return view('proveedores.eliminados', compact('prove'));
        //
    }

    public function cambiarEstado(Proveedor $prove, $estado)
    {

        $prove->estado = $estado;
        $prove->save();
        $ruta = $estado == 'A' ? 'proveedores.eliminados' : 'prove.index';
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

        return view('proveedores.create', compact('paises', 'departamentos', 'municipios'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'nit' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required|email',
            'pais_id' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('prove.index')->with('toast_success', 'Proveedor registrado correctamente');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $prove)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $prove)
    {
        $paises = Pais::all(); // Asegúrate de que el modelo Paises exista
        $departamentos = Departamento::all(); // Asegúrate de que el modelo Departamentos exista
        $municipios = Municipio::all(); // Asegúrate de que el modelo Municipios exista

        return view('proveedores.editar', compact('prove', 'paises', 'departamentos', 'municipios'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $prove)
    {
        // Validar los datos y actualizar el usuario
        $request->validate([
            'nombre' => 'required',
            'nit' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
            'pais_id' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
        ]);
        $prove->update($request->all());
        return redirect()->route('prove.index')->with('toast_success', 'Proveedor actualizado correctamente');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $prove)
    {
        //
    }
}
