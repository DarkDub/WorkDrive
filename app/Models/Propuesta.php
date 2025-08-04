<?php

// app/Models/Propuesta.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'servicio_id',
        'trabajador_id',
        'monto',
        'tiempo_estimado',
        'mensaje',
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicios::class);
    }

    public function trabajador()
    {
        return $this->belongsTo(User::class, 'trabajador_id');
    }
}
