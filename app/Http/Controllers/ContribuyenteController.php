<?php

namespace App\Http\Controllers;

use App\Models\Contribuyente;
use App\Models\ContribuyenteDNI;
use App\Models\ContribuyenteRUC;
use App\Models\PersonaJuridica;
use App\Models\PersonaNatural;
use Faker\Provider\ar_JO\Person;
use Illuminate\Http\Request;

class ContribuyenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contribuyentes = Contribuyente::paginate(10);
        return view('modulo.contribuyente.contribuyente', compact('contribuyentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = PersonaNatural::all();
        $empresas = PersonaJuridica::all();
        return view('modulo.contribuyente.create', compact('personas', 'empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contribuyente = new Contribuyente();
        $contribuyente->numero_telefonico = $request->telefono;
        $contribuyente->direccion = $request->direccion;
        $contribuyente->referencia = $request->referencia;
        $contribuyente->estado = 1;
        $contribuyente->save();

        if($request->id_tipo_identificacion == 1){
            $contribuyente_dni = new ContribuyenteDNI();
            $contribuyente_dni->id_persona_natural = $request->id_contribuyente;
            $contribuyente_dni->id_contribuyente = $contribuyente->id_contribuyente;
            $contribuyente_dni->save();
        }
        if($request->id_tipo_identificacion == 2){
            $contribuyente_ruc = new ContribuyenteRUC();
            $contribuyente_ruc->id_persona_juridico = $request->id_contribuyente;
            $contribuyente_ruc->id_contribuyente = $contribuyente->id_contribuyente;
            $contribuyente_ruc->save();
        }

        return redirect()->back()->with('estado', "se ha creado el contribuyente correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contribuyente = Contribuyente::find($id);
        $contribuyente->numero_telefonico = $request->numero_telefonico;
        $contribuyente->direccion = $request->direccion;
        $contribuyente->referencia = $request->referencia;
        $contribuyente->save();
        return redirect()->back()->with('estado', "Se ha actualizado correctamente")->with('alert', "alert-success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
