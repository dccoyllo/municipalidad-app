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
        return $this->belongsTo('App\Models\Servicio', 'id_servicio');
    }
    public function contribuyente()
    {
        return $this->belongsTo('App\Models\Contribuyente', 'id_contribuyente');
    }
    public function estado_contrato()
    {
        return $this->belongsTo('App\Models\EstadoContrato', 'id_estado_contrato');
    }
}
