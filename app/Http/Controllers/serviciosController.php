<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use Illuminate\Http\Request; // Importar correctamente la clase Request
use App\Models\Servicios; // Asegúrate de usar el modelo correcto (mayúscula en "Servicios")
use App\Models\Profesion; // Importar el modelo 'Profesion' correctamente
use App\Models\MetodoPago;
use App\Models\estado;
use App\Models\Notificaciones;
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
            'fecha' => 'required|date',
            'hora' => 'required|string',
            'tarifa' => 'required|numeric|min:0|max:100000000000',
            'labor_id' => 'required|exists:profesiones,id',  // Asegurarse de que la labor exista
            'pago_id' => 'required|exists:metodo_pago,id',
            'latitud' => 'nullable|numeric|between:-90,90',
            'longitud' => 'nullable|numeric|between:-180,180',
        ]);

        // Crear el servicio con la labor seleccionada
        Servicios::create([ // Nota que el nombre de la clase debe ser 'Servicios', con mayúscula
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
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

    public function aceptar(Request $request, $id)
    {
        $servicio = Servicios::findOrFail($id);
        if ($servicio->trabajador_id === null) {
            $servicio->trabajador_id = Auth::user()->registro->id;

            $estadoPendiente = estado::where('nombre', 'pendiente')->first();

            if ($estadoPendiente) {
                $servicio->estado_id = $estadoPendiente->id;
            }

            $servicio->save();

            Notificaciones::create([
                'user_id' => $servicio->user_id, 
                'message' => 'Un Trabajador a aceptado su servicio: "' . $servicio->nombre . '"',
                'read' => 0,
            ]);

            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Has aceptado esta solicitud']);
            }
            return redirect()->back()->with('success', 'Has aceptado esta solicitud');
        }

        if ($request->ajax()) {
            return response()->json(['error' => 'Esta solicitud ya fue aceptada por otro trabajador.'], 409);
        }

        return redirect()->back()->with('error', 'Esta solicitud ya fue aceptada por otro trabajador.');
    }
   public function checkAcceptance($id)
{
    $servicio = Servicios::with('estado', 'trabajador')->find($id);

    if (!$servicio) {
        return response()->json([
            'status' => 'error',
            'message' => 'Servicio no encontrado'
        ], 404);
    }

    if ($servicio->estado->nombre === 'pendiente' && $servicio->trabajador_id !== null) {
        $trabajador = $servicio->trabajador()->select('id', 'nombre', 'email')->first();

        return response()->json([
            'status' => 'accepted',
            'message' => 'Un trabajador aceptó tu servicio.',
            'trabajador' => $trabajador,
            'estado' => $servicio->estado->nombre,
        ]);
    }

    return response()->json([
        'status' => 'pending',
        'message' => 'Nadie ha aceptado tu servicio aún.',
        'estado' => $servicio->estado->nombre,
    ]);
}

public function updateStatus(Request $request, $id)
    {
        $servicio = Servicios::find($id);

        if (!$servicio) {
            return response()->json([
                'status' => 'error',
                'message' => 'Servicio no encontrado'
            ], 404);
        }

        $estadoNombre = $request->input('estado');

        $estado = Estado::where('nombre', $estadoNombre)->first();
        if (!$estado) {
            return response()->json([
                'status' => 'error',
                'message' => 'Estado inválido'
            ], 400);
        }

        $servicio->estado_id = $estado->id;
        $servicio->save();

        return response()->json([
            'status' => 'success',
            'message' => "Estado del servicio actualizado a: {$estado->nombre}"
        ]);
    }

    public function misSolicitudes()
    {
        $user = auth::user();
        $servicios = Servicios::where('user_id', $user->id)->get();

        if (request()->ajax()) {
            return response()->json($servicios);
        }

        return view('front.clients.servicios', compact('servicios', 'user'));
    }

    public function servicioDetails($id){

        $user = auth::user();
    
        $servicio = Servicios::with(['trabajador.usuario', 'trabajador.datosTrabajador'])->find($id);
        // dd($servicio);
        // dd($servicio->toArray());

        return view('front.clients.servicios-details', compact('servicio', 'user'));
    }


}
