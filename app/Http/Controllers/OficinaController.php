<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use Illuminate\Http\Request;

class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficinas = Oficina::all();
        return view('modulo.oficina.oficina', compact('oficinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulo.oficina.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oficina = new Oficina();
        $oficina->cod = $request->cod;
        $oficina->nombre = $request->nombre;
        $oficina->save();
        // return redirect()->intended('/oficina/create')->with('estado', 1);
        return redirect()->back()->with('estado-create', 1);
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
        $oficina = Oficina::find($id);
        return view('modulo.oficina.edit', compact('oficina'));
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
        $oficina = Oficina::find($id);
        $oficina->cod = $request->cod;
        $oficina->nombre = $request->nombre;
        $oficina->save();
        // return redirect()->action([OficinaController::class, 'edit'], $id)->with('estado', 1);
        return redirect()->action([OficinaController::class, 'index'])->with('estado-update', 1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oficina = Oficina::find($id);
        $oficina->delete();
        return redirect()->intended('oficina')->with('estado_oficina', 1);
    }
}
