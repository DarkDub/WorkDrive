<?php

namespace App\Http\Controllers;
use App\Models\AdminUser;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = AdminUser::with(['roles'])
        ->where('rol_id', '1, 2, 3')
        ->get();
        return view('usuariosAdmins.index', compact('users'));
    }
}
