<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = 'users';
    protected $guarded = [''];

    protected $fillable = [
        'name',
        'email',
        'password',
        'estado',
        'rol_id', // Asegúrate de que este campo exista en tu tabla
    ];
    

    public function roles()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
