<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRol extends Model
{
    use HasFactory;
    protected $table = 'users_rol';
    protected $primaryKey = 'id';

    public function rol()
    {
        return $this->hasOne('App\Models\Rol', 'id_rol', 'rol_id');
    }


    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
