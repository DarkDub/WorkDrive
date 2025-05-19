<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registro;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class UbicacionController extends Controller
{
    public function actualizar(Request $request)
{
    $request->validate([
        'latitud' => 'required|numeric',
        'longitud' => 'required|numeric',
    ]);

    $user = Auth::user();

    if (!$user) {
        return response()->json(['status' => 'Usuario no autenticado'], 401);
    }

    $registro = $user->registro;  // Acceder al registro relacionado (belongsTo)

    if (!$registro) {
        return response()->json(['status' => 'No se encontró el registro del usuario'], 404);
    }

    $registro->latitud = $request->latitud;
    $registro->longitud = $request->longitud;
    $registro->save();

    return response()->json(['status' => 'Ubicación guardada con éxito']);
}

public function listar(Request $request)
{
    $lat = $request->query('lat');
    $lon = $request->query('lon');
    $radio = 5;
    $profesionId = $request->query('profesion_id');

    if (!$lat || !$lon) {
        return response()->json(['error' => 'Ubicación del cliente no proporcionada'], 400);
    }

$query = DB::table('registros')
    ->join('datos_trabajador', 'registros.id', '=', 'datos_trabajador.registro_id')
    ->select(
        'registros.id', 
        'registros.nombre', 
        'registros.latitud', 
        'registros.longitud',
        DB::raw("6371 * acos(cos(radians($lat)) * cos(radians(registros.latitud)) * cos(radians(registros.longitud) - radians($lon)) + sin(radians($lat)) * sin(radians(registros.latitud))) AS distancia")
    )
    ->whereNotNull('registros.latitud')
    ->whereNotNull('registros.longitud');

if ($profesionId) {
    $query->where('datos_trabajador.profesion_id', $profesionId);
}

$query->having('distancia', '<', $radio);

$trabajadores = $query->get();

return response()->json($trabajadores);
}

}