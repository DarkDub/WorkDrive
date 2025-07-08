<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use App\Models\Registro;
use App\Models\Servicios;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Mostrar la vista del chat
    public function chat($trabajadorId, $clienteId)
    {
        $userRegistroId = Auth::user()->registro_id;

        // Validar que el usuario esté involucrado en el chat
        if ($userRegistroId != $trabajadorId && $userRegistroId != $clienteId) {
            abort(403, 'No autorizado para ver este chat');
        }

        // Obtener los registros de trabajador y cliente
        $trabajador = Registro::findOrFail($trabajadorId);
        $cliente = Registro::findOrFail($clienteId);

        // Saber con quién se está hablando
        $usuarioConElQueHablas = ($userRegistroId == $trabajadorId) ? $cliente : $trabajador;

        // Obtener el servicio relacionado entre ambos (último creado)
        $servicio = Servicios::where(function ($query) use ($trabajadorId, $clienteId) {
            $query->where('trabajador_id', $trabajadorId)
                  ->whereHas('usuario', function ($q) use ($clienteId) {
                      $q->where('registro_id', $clienteId);
                  });
        })->orWhere(function ($query) use ($trabajadorId, $clienteId) {
            $query->where('trabajador_id', $clienteId)
                  ->whereHas('usuario', function ($q) use ($trabajadorId) {
                      $q->where('registro_id', $trabajadorId);
                  });
        })->latest()->first();

        // Determinar si el chat está cerrado
        $chatCerrado = $servicio && $servicio->estado_id == 6;

        return view('pruebas.prueba2', compact(
            'trabajador',
            'cliente',
            'trabajadorId',
            'clienteId',
            'usuarioConElQueHablas',
            'chatCerrado'
        ));
    }

    // Enviar mensaje
    public function enviar(Request $request)
    {
        $request->validate([
            'contenido' => 'required|string',
            'trabajador_id' => 'required|exists:registros,id',
            'cliente_id' => 'required|exists:registros,id',
        ]);

        $userRegistroId = Auth::user()->registro_id;

        // Verificar si el servicio está completado para bloquear mensajes
        $servicio = Servicios::where(function ($query) use ($request) {
            $query->where('trabajador_id', $request->trabajador_id)
                  ->whereHas('usuario', function ($q) use ($request) {
                      $q->where('registro_id', $request->cliente_id);
                  });
        })->orWhere(function ($query) use ($request) {
            $query->where('trabajador_id', $request->cliente_id)
                  ->whereHas('usuario', function ($q) use ($request) {
                      $q->where('registro_id', $request->trabajador_id);
                  });
        })->latest()->first();

        if ($servicio && $servicio->estado_id == 6) {
            return response()->json(['error' => 'El servicio fue completado. El chat está cerrado.'], 403);
        }

        $mensaje = Mensaje::create([
            'contenido'     => $request->contenido,
            'user_id'       => $userRegistroId,
            'trabajador_id' => $request->trabajador_id,
            'cliente_id'    => $request->cliente_id,
        ]);

        return response()->json(['success' => true, 'mensaje' => $mensaje]);
    }

    // Obtener mensajes entre cliente y trabajador
    public function mensajes(Request $request)
    {
        $request->validate([
            'trabajador_id' => 'required|exists:registros,id',
            'cliente_id'    => 'required|exists:registros,id',
        ]);

        $mensajes = Mensaje::where(function ($query) use ($request) {
            $query->where('trabajador_id', $request->trabajador_id)
                  ->where('cliente_id', $request->cliente_id);
        })->orWhere(function ($query) use ($request) {
            $query->where('trabajador_id', $request->cliente_id)
                  ->where('cliente_id', $request->trabajador_id);
        })->orderBy('created_at', 'asc')->get();

        return response()->json(['mensajes' => $mensajes]);
    }
}
