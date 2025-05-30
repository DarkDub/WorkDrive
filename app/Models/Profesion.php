<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre', // Nombre de la profesión
    ];
    protected $table = 'profesiones';

    // Relación con los servicios (si un trabajador tiene servicios)
    public function servicios()
    {
        return $this->hasMany(servicios::class, 'labor_id');
    }
     public function datosTrabajadores()
    {
        return $this->hasMany(DatosTrabajador::class);
    }
}
