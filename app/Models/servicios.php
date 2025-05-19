<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\profesiones;
use App\Models\metodoPago;

class Servicios extends Model
{

    use HasFactory;

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'telefono',
        'descripcion',
        'tarifa',
        'estado',
        'user_id',
        'labor_id',
        'pago_id',
        'latitud',
        'longitud',
    ];

    // Definir las relaciones con otros modelos

    // Relación con la tabla 'labores' a través de 'labor_id'
    public function profesion()
    {
        return $this->belongsTo(profesion::class, 'labor_id');
    }

    // Relación con la tabla 'metodo_pago' a través de 'pago_id'
    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'pago_id');
    }
}
