<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registro extends Model
{
    use HasFactory;
    protected $table = 'registros';
    // protected $primaryKey = 'id_registro';
    protected $guarded = [];
    //

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'registro_id');
    }
    public function registro()
    {
        return $this->belongsTo(Registro::class);
    }
}
