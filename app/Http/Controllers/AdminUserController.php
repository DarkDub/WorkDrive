<?php

namespace App\Http\Controllers;
use App\Models\AdminUser;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = AdminUser::with(['rol'])
        ->where('estado', 'A')
        ->get();
        return view('usuariosAdmins.index', compact('users'));
    }
}
