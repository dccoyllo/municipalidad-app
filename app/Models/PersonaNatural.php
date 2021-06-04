<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaNatural extends Model
{
    use HasFactory;
    protected $table = 'persona_natural';
    protected $primaryKey = 'id_persona_natural';
}
