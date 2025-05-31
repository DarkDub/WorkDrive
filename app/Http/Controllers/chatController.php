<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use App\Models\Registro;
use App\Models\Servicios;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Vista del chat: recibe IDs de trabajador y cliente (registros)
    public function chat($trabajadorId, $clienteId)
    {
        $userRegistroId = Auth::user()->registro_id;


        // Validar que el usuario autenticado sea trabajador o cliente del chat
        if ($userRegistroId != $trabajadorId && $userRegistroId != $clienteId) {
            abort(403, 'No autorizado para ver este chat');
        }

        $trabajador = Registro::find($trabajadorId);
        $cliente = Registro::find($clienteId);
if ($userRegistroId == $trabajadorId) {
        $usuarioConElQueHablas = $cliente;
    } else {
        $usuarioConElQueHablas = $trabajador;
    }
        return view('pruebas.prueba2', compact('trabajador', 'cliente', 'trabajadorId', 'clienteId', 'usuarioConElQueHablas'));
    }

    // Enviar mensaje
    public function enviar(Request $request)
    {
        $request->validate([
            'contenido' => 'required|string',
            'trabajador_id' => 'required|exists:registros,id',
            'cliente_id' => 'required|exists:registros,id',
        ]);

        // Obtener el registro_id del usuario autenticado
        $userRegistroId = Auth::user()->registro_id;

        $mensaje = Mensaje::create([
            'contenido' => $request->contenido,
            'user_id' => $userRegistroId,
            'trabajador_id' => $request->trabajador_id,
            'cliente_id' => $request->cliente_id,
        ]);

        return response()->json(['success' => true, 'mensaje' => $mensaje]);
    }

    // Obtener mensajes entre trabajador y cliente (por registro_id)
    public function mensajes(Request $request)
    {
        $request->validate([
            'trabajador_id' => 'required|exists:registros,id',
            'cliente_id' => 'required|exists:registros,id',
        ]);

        $trabajadorId = $request->trabajador_id;
        $clienteId = $request->cliente_id;

        // Obtener todos los mensajes que coincidan con trabajador y cliente, ordenados cronológicamente
        $mensajes = Mensaje::where(function($q) use ($trabajadorId, $clienteId) {
    $q->where('trabajador_id', $trabajadorId)
      ->where('cliente_id', $clienteId);
})
->orWhere(function($q) use ($trabajadorId, $clienteId) {
    $q->where('trabajador_id', $clienteId)
      ->where('cliente_id', $trabajadorId);
})
->orderBy('created_at', 'asc')
->get();

        return response()->json(['mensajes' => $mensajes]);
    }
}
