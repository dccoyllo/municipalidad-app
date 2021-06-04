<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContribuyenteDNI extends Model
{
    use HasFactory;
    protected $table = 'contribuyente_dni';
    protected $primaryKey = 'id_contribuyente_dni';
    public function personaNatural()
    {
        return $this->belongsTo('App\Models\PersonaNatural', 'id_persona_natural');
    }
    public function contribuyente()
    {
        return $this->belongsTo('App\Models\Contribuyente', 'id_contribuyente');
    }
}
