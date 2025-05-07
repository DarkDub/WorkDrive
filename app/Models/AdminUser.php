<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = 'admin_users'; // Cambia la tabla si se llama diferente

    protected $guarded = [''];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'role_id');
    }
}
