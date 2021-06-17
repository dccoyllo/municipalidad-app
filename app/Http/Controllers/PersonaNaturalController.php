<?php

namespace App\Http\Controllers;

use App\Models\PersonaNatural;
use Illuminate\Http\Request;

class PersonaNaturalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pnatural = PersonaNatural::paginate(10);
        return view('modulo.cliente.persona', compact('pnatural'));
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
        $persona_natural = new PersonaNatural();
        $persona_natural->dni = $request->dni;
        $persona_natural->nombre = $request->nombre;
        $persona_natural->apellido_pa = $request->apellido_pa;
        $persona_natural->apellido_ma = $request->apellido_ma;
        $persona_natural->fecha_nacimiento = $request->fecha_nacimiento;
        $persona_natural->sexo = $request->sexo;
        $persona_natural->profesion = $request->profesion;
        $persona_natural->save();

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
        $persona_natural = PersonaNatural::find($id);
        $persona_natural->dni = $request->dni;
        $persona_natural->nombre = $request->nombre;
        $persona_natural->apellido_pa = $request->apellido_pa;
        $persona_natural->apellido_ma = $request->apellido_ma;
        $persona_natural->fecha_nacimiento = $request->fecha_nacimiento;
        $persona_natural->sexo = $request->sexo;
        $persona_natural->profesion = $request->profesion;
        $persona_natural->save();

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
        $persona_natural = PersonaNatural::find($id);
        $persona_natural->delete();
        return redirect()->back()->with('estado', "se ha eliminado correctamente.");
    }
}
