<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolSubModulo extends Model
{
    use HasFactory;
    protected $table = 'rol_submodulo';
    protected $primaryKey = 'id_rol_submodulo';

    public function rol()
    {
        // return $this->belongsToMany('App\Models\Rol', 'rol');
        return $this->hasOne('App\Models\Rol', 'id_rol');
    }
    // public function modulo()
    // {
    //     return $this->hasMany('App\Models\Modulo', 'id_modulo');
    // }
    public function SubModulo()
    {
        // return $this->hasMany('App\Models\Modulo');
        return $this->belongsTo('App\Models\SubModulo', 'id_submodulo');
    }
}
