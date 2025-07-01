<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
        // protected $fillable = [
    //     'nombre',
    //     'descripcion',
    //     'padre'
    // ];

    protected $guarded = ['estado'];

    public function rolPadre()
    {
        return $this->belongsTo(Permisos::class, 'padre');
    }
    public function rolHijos()
    {
        return $this->hasmany(Permisos::class, 'padre');
    }

//     public function adminUsers()
//     {
//         return $this->hasMany(AdminUser::class, 'role_id');
//     }

public function roles()
{
    return $this->belongsToMany(Rol::class, 'permiso_rol', 'permiso_id', 'rol_id');
}

}
