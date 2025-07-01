<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profesion;
use App\Models\MetodoPago;

class ClienteController extends Controller
{
    public function dashboard()
    {
        $profesiones = Profesion::all();
        $metodosPago = MetodoPago::all();

        return view('front.clients.index', compact('profesiones', 'metodosPago'));
    }
}
