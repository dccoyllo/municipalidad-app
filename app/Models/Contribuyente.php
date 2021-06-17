<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model
{
    use HasFactory;
    protected $table = 'contribuyente';
    protected $primaryKey = 'id_contribuyente';
    public function ContribuyenteDNI()
    {
        return $this->hasOne('App\Models\ContribuyenteDNI', 'id_contribuyente');
    }
    public function ContribuyenteRUC()
    {
        return $this->hasOne('App\Models\ContribuyenteRUC', 'id_contribuyente');
    }
}
