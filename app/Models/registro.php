<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registro extends Model
{
    use HasFactory;
    protected $table = 'registros';

    protected $guarded = [];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'registro_id');
    }

    public function profesion()
    {
        return $this->belongsTo(Profesion::class, 'profesion_id');
    }

    public function datosTrabajador()
    {
        return $this->hasOne(DatosTrabajador::class);
    }
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }
}
