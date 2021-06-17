<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaJuridica extends Model
{
    use HasFactory;
    protected $table = 'persona_juridico';
    protected $primaryKey = 'id_persona_juridico';
}
