<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'Usuario';
    protected $primaryKey = 'id_usuario';
    // protected $fillable = [
    //     'cuenta',
    //     'estado',
    //     'password',
    // ];
    protected $hidden = [
        'clave',
    ];
    public function rol()
    {
        return $this->belongsTo('App\Models\Rol', 'id_rol');
    }

}
