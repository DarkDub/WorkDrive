<?php

namespace App\Models;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Registro;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
     protected $table = 'datos_trabajador'; // Especifica la tabla explícitamente 

    protected $guarded = [''];

    public function Pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id');
    }

    public function Departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function Municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    public function registro()
    {
    return $this->belongsTo(Registro::class, 'registro_id');
    }

    public function Rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function profesion()
{
    return $this->belongsTo(Profesion::class, 'profesion_id');
}
    //
}
