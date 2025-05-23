<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicios;

class TrabajadorController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $servicios = Servicios::all();
        // Supongamos que en User tienes:
        // public function registro() { return $this->belongsTo(Registro::class); }
        // dd($servicios);
        $registro = $user->registro;

        $latitud = $registro ? $registro->latitud : null;
        $longitud = $registro ? $registro->longitud : null;

        return view('front.trabajadores.index', compact('latitud', 'longitud', 'servicios', 'user'));
    }
}
