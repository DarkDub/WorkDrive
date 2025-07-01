<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    protected $fillable = [
        'user_id',
        'message',
        'read',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
