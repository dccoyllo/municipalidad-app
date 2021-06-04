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
    
    public function UserRol()
    {
        return $this->hasOne('App\Models\UserRol', 'user_id', 'id');
    }
    public function UserEmpleado()
    {
        return $this->hasOne('App\Models\UserEmpleado', 'user_id', 'id');
    }

}
