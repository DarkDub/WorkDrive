<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicios;
use App\Models\User;

class TrabajadorController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $laborId = $user->registro?->datosTrabajador?->profesion_id;

        // Obtener solo servicios que NO estén en estado "en_proceso"
        $servicios = Servicios::with(['usuario.registro', 'estado'])
            ->where('labor_id', $laborId)
            ->whereHas('estado', function ($q) {
                $q->where('nombre', '!=', 'en proceso');
            })
            ->orderByDesc('created_at')
            ->get();

        $registro = $user->registro;
        $latitud = $registro?->latitud;
        $longitud = $registro?->longitud;

        return view('front.trabajadores.index', compact('latitud', 'longitud', 'servicios', 'user'));
    }

    public function solicitudes(Request $request)
    {
        $userId = Auth::user()->registro->id;
        $estadoNombre = $request->query('estado', 'all');
        $search = $request->query('search', null);
        $startDate = $request->query('start_date', null);
        $endDate = $request->query('end_date', null);

        $query = Servicios::where('trabajador_id', $userId)
            ->with('usuario.registro');

        if (in_array($estadoNombre, ['pendiente', 'completado'])) {
            $query->whereHas('estado', function ($q) use ($estadoNombre) {
                $q->where('nombre', $estadoNombre);
            });
        }

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhereHas('usuario.registro', function ($q2) use ($search) {
                        $q2->where('nombre', 'like', "%$search%")
                            ->orWhere('email', 'like', "%$search%");
                    });
            });
        }

        $solicitudes = $query->orderBy('created_at')->get();

        // Contadores
        $totalQuery = Servicios::where('trabajador_id', $userId);
        $pendientesQuery = Servicios::where('trabajador_id', $userId)
            ->whereHas('estado', fn($q) => $q->where('nombre', 'pendiente'));
        $completadosQuery = Servicios::where('trabajador_id', $userId)
            ->whereHas('estado', fn($q) => $q->where('nombre', 'completado'));

        foreach (['startDate' => $startDate, 'endDate' => $endDate, 'search' => $search] as $key => $value) {
            if ($value) {
                if ($key === 'search') {
                    foreach ([$totalQuery, $pendientesQuery, $completadosQuery] as $queryToModify) {
                        $queryToModify->where(function ($q) use ($value) {
                            $q->where('id', $value)
                                ->orWhereHas('usuario.registro', function ($q2) use ($value) {
                                    $q2->where('nombre', 'like', "%$value%")
                                        ->orWhere('email', 'like', "%$value%");
                                });
                        });
                    }
                } else {
                    $column = $key === 'startDate' ? '>=' : '<=';
                    foreach ([$totalQuery, $pendientesQuery, $completadosQuery] as $queryToModify) {
                        $queryToModify->whereDate('created_at', $column, $value);
                    }
                }
            }
        }

        $total = $totalQuery->count();
        $pendientes = $pendientesQuery->count();
        $completados = $completadosQuery->count();

        return view('front.trabajadores.solicitudes', compact(
            'solicitudes',
            'estadoNombre',
            'total',
            'pendientes',
            'completados'
        ));
    }

    public function solicitudDetalles($id)
    {
        $user = Auth::user();
        $solicitud = Servicios::with(['usuario.registro', 'trabajador', 'estado'])->findOrFail($id);

        return view('front.trabajadores.solicitud-detalle', compact('solicitud', 'user'));
    }
}
