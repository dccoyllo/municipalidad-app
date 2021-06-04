<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubModulo extends Model
{
    use HasFactory;
    protected $table = 'submodulo';
    protected $primaryKey = 'id_submodulo';
    public function modulo()
    {
        return $this->hasMany('App\Models\Modulo', 'id_modulo');
    }
    public function RolSubModulo()
    {
        // return $this->belongsToMany('App\Models\Rol', 'rol');
        // Si el id tienen diferentes nombres
        return $this->hasOne('App\Models\RolSubModulo', 'id_submodulo');
    }
}
