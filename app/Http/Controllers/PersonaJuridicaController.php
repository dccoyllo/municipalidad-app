<?php

namespace App\Http\Controllers;

use App\Models\PersonaJuridica;
use Illuminate\Http\Request;

class PersonaJuridicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pjuridicas = PersonaJuridica::paginate(10);
        return view('modulo.cliente.empresa', compact('pjuridicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pjuridica = new PersonaJuridica();
        $pjuridica->ruc = $request->ruc;
        $pjuridica->razon_social = $request->razon_social;
        $pjuridica->propietario = $request->propietario;
        $pjuridica->descripcion = $request->descripcion;
        $pjuridica->fecha = $request->fecha;
        $pjuridica->save();
        return redirect()->back()->with('estado', "se ha creado correctamente.");
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
        $pjuridica = PersonaJuridica::find($id);
        $pjuridica->ruc = $request->ruc;
        $pjuridica->razon_social = $request->razon_social;
        $pjuridica->propietario = $request->propietario;
        $pjuridica->descripcion = $request->descripcion;
        $pjuridica->save();
        return redirect()->back()->with('estado', "se ha actualizado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pjuridica = PersonaJuridica::find($id);
        $pjuridica->delete();
        return redirect()->back()->with('estado', "se ha eliminado correctamente.");
    }
}
