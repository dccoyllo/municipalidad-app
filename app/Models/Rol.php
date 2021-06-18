<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'rol';
    protected $primaryKey = 'id_rol';
    public function RolModulo()
    {
        // return $this->belongsToMany('App\Models\Rol', 'rol');
        // Si el id tienen diferentes nombres
        return $this->hasMany(RolModulo::class, 'id_rol', 'id_rol');
    }
}
