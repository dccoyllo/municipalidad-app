<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Contribuyente;
use App\Models\ContribuyenteDNI;
use App\Models\ContribuyenteRUC;
use App\Models\EstadoContrato;
use App\Models\PersonaJuridica;
use App\Models\PersonaNatural;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::paginate(10);
        $estados = EstadoContrato::all();
        return view('modulo.contrato.contrato', compact('contratos', 'estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = Servicio::all();
        $contribuyente = Contribuyente::all();
        $dni = ContribuyenteDNI::all();
        $ruc = PersonaJuridica::all();
        return view('modulo.contrato.create', compact('servicios', 'contribuyente', 'dni', 'ruc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contrato = New Contrato();
        $contrato->cod = $request->cod;
        $contrato->nombre = $request->nombre;
        $contrato->id_contribuyente = $request->id_contribuyente;
        $contrato->id_servicio = $request->id_servicio;
        $contrato->fecha = $request->fecha;
        $contrato->impuesto = $request->impuesto;
        $contrato->descripcion = $request->descripcion;
        // $request->descripcion = ("") ? $contrato->descripcion = $request->descripcion : $contrato->descripcion = "sin descripcion";
        $contrato->id_estado_contrato = 1;
        $contrato->save();
        // return redirect()->action([OficinaController::class, 'edit'], $id)->with('estado', 1);
        return redirect()->back()->with('estado', "Se ha creado el contrato correctamente.");
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
        $contrato = Contrato::find($id);
        $contrato->nombre = $request->nombre;
        $contrato->descripcion = $request->descripcion;
        $contrato->fecha = $request->fecha;
        $contrato->id_estado_contrato = $request->estado;
        $contrato->save();
        // return redirect()->action([OficinaController::class, 'edit'], $id)->with('estado', 1);
        return redirect()->back()->with('estado-update', 1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id);
        $contrato->delete();
        return redirect()->back()->with('estado', "se ha eliminado correctamente");
    }
}
