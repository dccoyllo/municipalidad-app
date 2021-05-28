<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolModulo extends Model
{
    use HasFactory;
    protected $table = 'rol_modulo';
    protected $primaryKey = 'id_rol_modulo';

    public function rol()
    {
        // return $this->belongsToMany('App\Models\Rol', 'rol');
        // hasMany relaciona la tabla principal
        return $this->hasMany('App\Models\Rol', 'id_rol');
    }
    // public function modulo()
    // {
    //     return $this->hasMany('App\Models\Modulo', 'id_modulo');
    // }
    public function modulo()
    {
        // return $this->hasMany('App\Models\Modulo');
        // Si el id tienen diferentes nombres belongsTo referencia a los id de las tablas hijos
        return $this->belongsTo('App\Models\Modulo', 'id_modulo');
    }
}
