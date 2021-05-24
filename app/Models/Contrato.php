<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $table = 'contrato';
    protected $primaryKey = 'id_contrato';
    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicios', 'id_servicio');
    }
}
