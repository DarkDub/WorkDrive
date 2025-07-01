<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'registros';

    protected $guarded = ['']; // Permite asignación masiva

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
}
