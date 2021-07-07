<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CobroArbitrio extends Model
{
    use HasFactory;
    protected $table = 'cobro_arbitrio';
    protected $primaryKey = 'id_cobro_arbitrio';
    public function Contribuyente()
    {
        return $this->hasOne('App\Models\Contribuyente', 'id_contribuyente');
    }
}
