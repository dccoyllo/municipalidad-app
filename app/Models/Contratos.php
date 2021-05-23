<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_contrato';
    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicios', 'id_servicio');
    }
}
