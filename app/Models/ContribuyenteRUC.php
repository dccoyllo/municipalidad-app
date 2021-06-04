<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContribuyenteRUC extends Model
{
    use HasFactory;
    protected $table = 'contribuyente_ruc';
    protected $primaryKey = 'id_contribuyente_ruc';
    public function personaJuridica()
    {
        return $this->belongsTo('App\Models\PersonaJuridica', 'id_persona_juridico');
    }
    public function contribuyente()
    {
        return $this->belongsTo('App\Models\Contribuyente', 'id_contribuyente');
    }
}
