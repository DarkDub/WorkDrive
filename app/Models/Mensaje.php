<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'trabajador_id', 'cliente_id', 'contenido'];

    public function usuario()
    {
        return $this->belongsTo(Registro::class, 'user_id');
    }

    // Relación con el trabajador que recibe
    public function trabajador()
    {
        return $this->belongsTo(Registro::class, 'trabajador_id');
    }
}
