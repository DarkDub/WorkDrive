<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    /* protected $fillable = [
        'nombre', 'nit', 'telefono', 'direccion', 'correo', 
        'estado', 'pais_id', 'departamento_id', 'municipio_id'
    ];   */

    protected $table = 'datos_trabajador'; // Especifica la tabla explícitamente 

    protected $guarded = [''];

    public function Tipo_documentos()
    {
        return $this->belongsTo(Tipo_documentos::class, 'tipo_documento');
    }

    public function Profesiones()
    {
        return $this->belongsTo(Profesion::class, 'profesion_id');
    }

}
