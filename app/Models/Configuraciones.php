<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuraciones extends Model
{
        // protected $fillable = [
    //     'nombre',
    //     'descripcion',
    //     'padre'
    // ];

    protected $guarded = ['estado'];

    public function rolPadre()
    {
        return $this->belongsTo(Configuraciones::class, 'padre');
    }
    public function rolHijos()
    {
        return $this->hasmany(Configuraciones::class, 'padre');
    }

//     public function adminUsers()
//     {
//         return $this->hasMany(AdminUser::class, 'role_id');
//     }
}
