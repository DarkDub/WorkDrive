<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function dashboard()
    {
        return view('front.trabajadores.index');
    }
}
