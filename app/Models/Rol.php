<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    // protected $fillable = [
    //     'nombre',
    //     'descripcion',
    //     'padre'
    // ];

    protected $guarded = ['estado'];

    public function rolPadre()
    {
        return $this->belongsTo(Rol::class, 'padre');
    }
    public function rolHijos()
    {
        return $this->hasmany(Rol::class, 'padre');
    }

//     public function adminUsers()
//     {
//         return $this->hasMany(AdminUser::class, 'role_id');
//     }
  public function users()
    {
        return $this->hasMany(User::class, 'rol_id');
    }
}
