<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = 'users';

    protected $guarded = [''];

    public function roles()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}