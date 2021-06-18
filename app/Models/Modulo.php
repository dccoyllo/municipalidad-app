<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;
    protected $table = 'modulo';
    protected $primaryKey = 'id_modulo';

    public function submodulo()
    {
        return $this->hasMany(SubModulo::class, 'id_modulo');
    }
}
