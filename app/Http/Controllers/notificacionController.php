<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificaciones;
use Illuminate\Support\Facades\Auth;

class notificacionController extends Controller
{
    public function index() {
    return view('pruebas.prueba');
}

    public function getNotificaciones() {

        $notificaciones = Notificaciones::with('user.registro')->where('user_id', Auth::id())->where('read', false)->orderBy('created_at', 'desc')->get();
        // dd($notificaciones);
        return response()->json($notificaciones);

    }

    public function markAsRead(Request $request){
        $notificaciones = Notificaciones::where('id', $request->id)->where('user_id', Auth::id())->first();

        if($notificaciones){
            $notificaciones->update(['read' => true]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function obtenerNoLeidas()
{
    $userId = Auth::id();
    $notificaciones = Notificaciones::where('user_id', $userId)
                                     ->where('read', 0)
                                     ->latest()
                                     ->get();

    return response()->json([
        'count' => $notificaciones->count(),
        'notificaciones' => $notificaciones
    ]);
}

public function marcarLeidas()
{
    $userId = Auth::id();
    Notificaciones::where('user_id', $userId)
                  ->where('read', 0)
                  ->update(['read' => 1]);

    return response()->json(['message' => 'Notificaciones marcadas como leídas']);
}


}
