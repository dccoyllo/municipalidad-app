<?php

namespace App\Http\Controllers;

use App\Models\CobroArbitrio;
use App\Models\Contribuyente;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CobroArbitrioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cobroArbitrios = CobroArbitrio::paginate(10);
        return view('modulo.cobro.cobro', compact('cobroArbitrios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contribuyentes = new Collection(Contribuyente::all()->load("ContribuyenteDNI.PersonaNatural", "ContribuyenteRUC.PersonaJuridica"));
        return view('modulo.cobro.create', compact('contribuyentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cobroArbitrio = new CobroArbitrio();
        $cobroArbitrio->tipo_pago = "Mensual";
        $cobroArbitrio->precio_mensual = $request->precio_mensual;
        $cobroArbitrio->precio_anual = $request->precio_anual;
        $cobroArbitrio->descripcion = $request->descripcion;
        $cobroArbitrio->estado = "Pendiente";
        $cobroArbitrio->id_contribuyente = $request->id_contribuyente;
        $cobroArbitrio->save();
        return redirect()->back()->with('msg', "Se ha añadido correctamente.");
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
        $cobroArbitrio = CobroArbitrio::find($id);
        return view('modulo.cobro.editar', compact('cobroArbitrio'));
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
        $cobroArbitrio = CobroArbitrio::find($id);
        
        if ($cobroArbitrio->pago_actual == null) {
            $cobroArbitrio->pago_actual = $request->pago_actual;
            $cobroArbitrio->fecha_primer_pago = $request->fecha_pago;    
        }else{
            $cobroArbitrio->pago_actual = $request->pago_actual;
        }

        if ($cobroArbitrio->pago_actual == $cobroArbitrio->precio_anual) {
            $cobroArbitrio->estado = 'Pagado';
            $cobroArbitrio->tipo_pago = 'Anual';
        }else{
            $cobroArbitrio->estado = 'Pendiente';
            $cobroArbitrio->tipo_pago = $request->tipo_pago;
        }
        
        $cobroArbitrio->fecha_ultimo_pago = $request->fecha_pago;
        $cobroArbitrio->save();
        return redirect()->back()->with('msg', "Se ha cobrado correctamente.");
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
