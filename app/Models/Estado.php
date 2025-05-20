<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    protected $table = 'estados';
    protected $fillable = [
        'nombre',
    ];

    public function servicios()
    {
        return $this->hasMany(servicios::class, 'estado_id');
    }
}
