<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosTrabajador;
use App\Models\Profesion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Registro;
use Illuminate\Support\Facades\Auth;

class DatosTrabajadorController extends Controller
{
    // Mostrar el formulario
    public function create()
    {
        $profesiones = Profesion::all();
        return view('auth.registro-trabajador', compact('profesiones'));
    }

    // Procesar el formulario de registro
    public function store(Request $request, $registro_id)
    {
        // Validar datos recibidos
        $request->validate([
            'registro_id' => 'required|exists:registros,id',
            'nombre' => 'required|string|max:255',
            'tipo_documento ' => 'require',
            'numero_documento' => 'required|string|unique:datos_trabajador,numero_documento',
            'profesion_id' => 'required',
            // 'otra_labor' => 'required_if:profesion_id,otro|string|max:255',
            'hoja_vida' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'foto_documento' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Si eligió "Otro" y especificó una labor nueva, podemos crearla y usar su ID
        if ($request->profesion_id === 'otro') {
            $nuevaProfesion = Profesion::create([
                'nombre' => $request->otra_labor,
            ]);
            $profesionId = $nuevaProfesion->id;
        } else {
            $profesionId = $request->profesion_id;
        }

        // Guardar archivo hoja de vida
        $path = $request->file('hoja_vida')->store('hojas_vida', 'public');
        $path = $request->file('foto_documento')->store('fotos_documento', 'public');

        // Para registro_id, aquí debes adaptarlo según cómo lo obtienes o si el usuario está autenticado.
        // Por ejemplo, si el trabajador tiene un registro relacionado:
        // $registroId = auth()->user()->registro->id ?? null;

        // Crear nuevo registro en datos_trabajador
        DatosTrabajador::create([
            'nombre' => $request->nombre,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'hoja_vida' => $path,
            'foto_documento' => $path,
            'registro_id' => $request->registro_id,
            'profesion_id' => $profesionId,

        ]);


        $registro = Registro::findOrFail($registro_id);
        $user = User::where('registro_id', $registro_id)->firstOrFail();

        $user->sendEmailVerificationNotification();
        Auth::login($user);

        return redirect()->route('verification.notice')->with('success', 'Registro exitoso. Por favor inicie sesión.');
    }
}
