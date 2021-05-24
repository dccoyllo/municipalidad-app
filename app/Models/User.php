<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'cuenta',
        'email',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function rol()
    {
        return $this->belongsTo('App\Models\Rol', 'id_rol');
    }
    public function empleado()
    {
        return $this->belongsTo('App\Models\Empleado', 'id_empleado');
    }

}
