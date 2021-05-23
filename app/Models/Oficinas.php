<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficinas extends Model
{
    use HasFactory;
    protected $table = 'Oficina';
    protected $primaryKey = 'id_oficina';
}
