<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmpleado extends Model
{
    use HasFactory;
    protected $table = 'users_empleado';
    // protected $primaryKey = 'id_rol_modulo';

    public function empleado()
    {
        // return $this->belongsToMany('App\Models\Rol', 'rol');
        return $this->hasOne('App\Models\Empleado', 'id_empleado', 'empleado_id');
    }


    public function user()
    {
        // return $this->belongsToMany('App\Models\User', 'rol');
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

}
