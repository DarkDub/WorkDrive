<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre', // El nombre del método de pago (por ejemplo, "Tarjeta de crédito")
    ];
 protected $table = 'metodo_pago';
    // Relación con los servicios
    public function servicios()
    {
        return $this->hasMany(servicios::class, 'pago_id');
    }
}
