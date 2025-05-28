<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acciones extends Model
{
        // protected $fillable = [
    //     'nombre',
    //     'descripcion',
    //     'padre'
    // ];

    protected $guarded = ['estado'];

    public function rolPadre()
    {
        return $this->belongsTo(Acciones::class, 'padre');
    }
    public function rolHijos()
    {
        return $this->hasmany(Acciones::class, 'padre');
    }

//     public function adminUsers()
//     {
//         return $this->hasMany(AdminUser::class, 'role_id');
//     }
}
