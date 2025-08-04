<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Propuesta;
use App\Models\Servicios;
use App\Models\Notificaciones;

class PropuestasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'monto' => 'required|numeric|min:0',
            'tiempo_estimado' => 'required|string|max:255',
            'mensaje' => 'nullable|string',
        ]);

        $propuesta = Propuesta::create([
            'servicio_id' => $request->servicio_id,
            'trabajador_id' => Auth::id(),
            'monto' => $request->monto,
            'tiempo_estimado' => $request->tiempo_estimado,
            'mensaje' => $request->mensaje,
        ]);

        // Obtener el servicio y el cliente que lo creó
        $servicio = Servicios::find($request->servicio_id);
        $clienteId = $servicio->user_id;
        $trabajadorId = $servicio->trabajador_id;

        // Crear notificación para el cliente
        Notificaciones::create([
            'user_id' => $clienteId,
            'message' => '<strong>' . Auth::user()->name . '!!</strong> te ha enviado una propuesta para tu servicio "' . $servicio->nombre . '"',
            'read' => 0,
        ]);



        return redirect()->back()->with('success', 'Propuesta enviada correctamente.');
    }
}
