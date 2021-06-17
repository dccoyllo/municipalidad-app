<?php

namespace App\Http\Controllers;

use App\Models\PersonaJuridica;
use App\Models\PersonaNatural;

class BuscadorController extends Controller
{
    public function getSearchDNI($dni)
    {
        $dni = PersonaNatural::where('dni', 'like', $dni."%")->take(1)->get();
        return $dni;
    }
    public function getSearchRUC($dni)
    {
        $ruc = PersonaJuridica::where('ruc', 'like', $dni."%")->take(1)->get();
        return $ruc;
    }
}
