<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Oficina;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        $oficinas = Oficina::all();
        return view('modulo.empleado.empleado', compact('empleados', 'oficinas'));
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
        $empleado = new Empleado();
        $empleado->dni = $request->dni;
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->cargo = $request->cargo;
        $empleado->id_oficina = $request->id_oficina;
        $empleado->save();
        // return redirect()->intended('/empleado/create')->with('estado', 1);
        return redirect()->intended('/empleado')->with('mensaje', "se ha creado correctamente");
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
        $empleado = Empleado::find($id);
        $empleado->dni = $request->dni;
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->cargo = $request->cargo;
        $empleado->id_oficina = $request->id_oficina;
        $empleado->save();
        // return redirect()->intended('/empleado/create')->with('estado', 1);
        return redirect()->action([EmpleadoController::class, 'index'])->with('mensaje', "Se ha actualizado correctamente.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect()->intended('empleado')->with('mensaje', "se ha borrado correctamente.");
    }
}
