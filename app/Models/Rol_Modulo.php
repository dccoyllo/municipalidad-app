<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_Modulo extends Model
{
    use HasFactory;
    protected $table = 'Rol_modulo';
    protected $primaryKey = 'id_rol_modulo';
    public function rol()
    {
        return $this->belongsTo('App\Models\Rol', 'id_rol');
    }
    public function modulo()
    {
        return $this->belongsTo('App\Models\Modulo', 'id_modulo');
    }
}
