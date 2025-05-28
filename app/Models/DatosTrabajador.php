<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatosTrabajador extends Model
{
    protected $table = 'datos_trabajador';

     protected $fillable = [
        'nombre',
        'tipo_documento',
        'numero_documento',
        'hoja_vida',
        'document_foto',
        'registro_id',
        'profesion_id',
    ];
    
    public function registro()
    {
        return $this->belongsTo(Registro::class);
    }

    public function profesion()
    {
        return $this->belongsTo(Profesion::class);
    }
}
