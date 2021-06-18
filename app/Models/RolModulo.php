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
        return $this->belongsTo(Rol::class, 'id_rol');
    }
    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }
}
