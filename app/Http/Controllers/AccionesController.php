<?php

namespace App\Http\Controllers;
use App\Models\Acciones;
use Illuminate\Http\Request;

class AccionesController extends Controller
{
        public function index()
    {
        return view('acciones.index');
    }
}
