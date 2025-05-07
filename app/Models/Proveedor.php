<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    /* protected $fillable = [
        'nombre', 'nit', 'telefono', 'direccion', 'correo', 
        'estado', 'pais_id', 'departamento_id', 'municipio_id'
    ];   */

    protected $table = 'proveedores'; // Especifica la tabla explícitamente 

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
    //
}
