<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use GuzzleHttp\Client;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::with(['pais', 'departamento', 'municipio'])
             ->where('rol_id', '5')
            ->get();

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();

        return view('clientes.create', compact('paises', 'departamentos', 'municipios'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:50',
        //     'nombre' => 'required|string|max:255',
        //     'email' => 'required',
        //     'telefono' => 'nullable|string|max:20',
        //     'direccion' => 'nullable|string|max:255',
        //     'nit' => 'required|string|max:20|unique:clientes,nit',
        //     'codigo_postal' => 'nullable|string|max:20',
        //     'pais_id' => 'required|exists:paises,id',
        //     'departamento_id' => 'required|exists:departamentos,id',
        //     'municipio_id' => 'required|exists:municipios,id',
        // ]);

        Clientes::create([
            'name' => $request->name,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'nit' => $request->nit,
            'codigo_postal' => $request->codigo_postal,
            'pais_id' => $request->pais_id,
            'departamento_id' => $request->departamento_id,
            'municipio_id' => $request->municipio_id,
            'estado' => 'A',
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    public function show(Clientes $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Clientes $cliente)
    {
        $paises = Pais::all();
        
        $departamentos = Departamento::all();
        $municipios = Municipio::all();

        return view('clientes.editar', compact('cliente', 'paises', 'departamentos', 'municipios'));

    }

    // public function update(Request $request, Clientes $cliente)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:50',
    //         'nombre' => 'required|string|max:255',
    //         'email' => 'required|email|unique:clientes,email,' . $cliente->id,
    //         'telefono' => 'nullable|string|max:20',
    //         'direccion' => 'nullable|string|max:255',
    //         'nit' => 'required|string|max:20|unique:clientes,nit,' . $cliente->id,
    //         'codigo_postal' => 'nullable|string|max:20',
    //         'pais_id' => 'required|exists:paises,id',
    //         'departamento_id' => 'required|exists:departamentos,id',
    //         'municipio_id' => 'required|exists:municipios,id',
    //     ]);

    //     $cliente->update([
    //         'name' => $request->name,
    //         'nombre' => $request->nombre,
    //         'email' => $request->email,
    //         'telefono' => $request->telefono,
    //         'direccion' => $request->direccion,
    //         'nit' => $request->nit,
    //         'codigo_postal' => $request->codigo_postal,
    //         'pais_id' => $request->pais_id,
    //         'departamento_id' => $request->departamento_id,
    //         'municipio_id' => $request->municipio_id,
    //     ]);

    //     return redirect()->route('cliente.index')->with('success', 'Cliente actualizado exitosamente.');
    // }
    public function update(Request $request, Clientes $cliente)
    {
        // Validar los datos y actualizar el usuario
        // $request->validate([
        //     'name' => 'required',
        //     'nombre' => 'required',
        //     'email' => 'required',
        //     'nit' => 'required',
        //     'telefono' => 'required',
        //     'direccion' => 'required',
        //     'correo' => 'required',
        //     'codigo_postal' => 'required',
        //     'pais_id' => 'required',
        //     'departamento_id' => 'required',
        //     'municipio_id' => 'required',
        // ]);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('toast_success', 'Proveedor actualizado correctamente');
        //
    }
    public function destroy(Clientes $cliente)
    {
        $cliente->update([
            'estado' => '*',
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }

    public function Eliminados()
    {
        $clientes = Clientes::with(['pais', 'departamento', 'municipio'])->where('estado', '*')->get();
        return view('clientes.eliminados', compact('clientes'));
    }

    public function cambiarEstado(Request $request, Clientes $cliente, $estado)
    {
        $cliente->update([
            'estado' => $estado,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Estado del cliente actualizado exitosamente.');
    }
}
