<?php

namespace App\Http\Controllers;
use App\Models\Configuraciones;
use Illuminate\Http\Request;

class ConfiguracionesController extends Controller
{
        public function index()
    {
        return view('Configuraciones.index');
    }
}
