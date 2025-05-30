<?php

namespace App\Models;
use App\Notifications\CustomVerifyEmail;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Rol;
use Illuminate\Notifications\Notification;
use PHPUnit\Framework\TestStatus\Notice;

class User extends Authenticatable implements MustVerifyEmail

{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id',
        'registro_id',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


public function sendEmailVerificationNotification()
{
    $this->notify(new CustomVerifyEmail());
}

    public function registro()
    {
        return $this->belongsTo(Registro::class, 'registro_id');
    }


    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id'); // corregido: relación con Rol, usando la clave foránea 'rol_id'
    }
    // app/Models/User.php
public function profesion()
{
    return $this->belongsTo(Profesion::class);
}

public function notificaciones()
{
    return $this->hasMany(Notificaciones::class, 'user_id');
}

}
