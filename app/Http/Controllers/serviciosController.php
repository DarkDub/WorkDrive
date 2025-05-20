<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request; // Importar correctamente la clase Request
use App\Models\Servicios; // Asegúrate de usar el modelo correcto (mayúscula en "Servicios")
use App\Models\Profesion; // Importar el modelo 'Profesion' correctamente
use App\Models\MetodoPago;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller
{
    public function index()
    {
        // Aquí va la lógica para mostrar los servicios
        $profesiones = DB::table('profesiones')->get();
        $metodosPago = DB::table('metodo_pago')->get();
        $servicios = DB::table('servicios')->get();
        // return $profesiones;

        return view('front.clients.index', compact('profesiones', 'metodosPago', 'servicios'));
    }

    public function store(Request $request)
    { // Asegurarse de que el parámetro $request esté incluido
        // Validación de los datos recibidos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'descripcion' => 'required|string',
            'fecha' => 'required|string',
            'hora' => 'required|string',
            'tarifa' => 'nullable|string',
            // 'estado_id' => 'required|string',
            'labor_id' => 'required|exists:profesiones,id',  // Asegurarse de que la labor exista
            'pago_id' => 'required|exists:metodo_pago,id',
            'latitud' => 'nullable|numeric|between:-90,90',
            'longitud' => 'nullable|numeric|between:-180,180',
        ]);

        // Crear el servicio con la labor seleccionada
        Servicios::create([ // Nota que el nombre de la clase debe ser 'Servicios', con mayúscula
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha' => $request->hora,
            'hora' => $request->fecha,
            'tarifa' => $request->tarifa,
            'labor_id' => $request->labor_id, // Guardar la labor seleccionada
            'pago_id' => $request->pago_id,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'user_id' => Auth::id(),  // O auth()->id()
        ]);


        // Redireccionar con un mensaje de éxito o donde sea necesario
        return redirect()->back()->with('success', 'Servicio creado con éxito!');
        // return view('front.clients.index');
    }

    public function IndexPagos()
    {
        $metodosPago = MetodoPago::All();

        return view('front.clients.index', compact('metodosPago'));
    }
}
