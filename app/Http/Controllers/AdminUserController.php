<?php

namespace App\Http\Controllers;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $estado = $request->get('estado', 'All');

        $query = AdminUser::with(['roles'])
            ->whereHas('roles', function ($q) {
                $q->where('rol_id', 2); // ✅ Este es el filtro por rol (desde registros)
            });

        if ($estado !== 'All') {
            $query->where('estado', $estado);
        }

        $users = $query->get();

        return view('usuariosAdmins.index', compact('users'));
    }

    public function Eliminados()
    {
        session(['mensaje' => 'Eliminar']);
        $users = AdminUser::with(['roles'])->where('estado', '*')->get();
        return view('usuariosAdmins.eliminados', compact('users'));
        //
    }

    public function actualizarEstado(Request $request, $id)
    {
        /* dd($request->all()); */
        $users = AdminUser::findOrFail($id);
        $users->estado = $request->estado;
        $users->save();

        return redirect()->back()->with('success', 'Estado actualizado correctamente');
    }

    public function CambiarEstado(AdminUser $users, $estado)
    {
        $users->estado = $estado;
        $ruta = $estado == 'A' ? 'usuariosAdmins.eliminados' : 'usuariosAdmins.index';
        $users->save();

        return redirect()->route($ruta);
    }
    
}   
