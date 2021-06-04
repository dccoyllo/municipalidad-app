<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'rol';
    protected $primaryKey = 'id_rol';
    public function RolSubModulo()
    {
        // return $this->belongsToMany('App\Models\Rol', 'rol');
        // Si el id tienen diferentes nombres
        return $this->hasMany('App\Models\RolSubModulo', 'id_rol', 'id_rol');
    }
}
