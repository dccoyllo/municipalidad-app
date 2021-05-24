<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleado';
    protected $primaryKey = 'id_empleado';
    public function oficina()
    {
        return $this->belongsTo('App\Models\Oficina', 'id_oficina');
    }
}
