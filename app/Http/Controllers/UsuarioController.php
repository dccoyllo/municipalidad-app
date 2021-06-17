<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Rol;
use App\Models\User;
use App\Models\UserEmpleado;
use App\Models\UserRol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        $roles = Rol::all();
        $empleados = Empleado::all();
        return view('modulo.usuario.usuario', compact('usuarios', 'roles', 'empleados'));
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
        $usuario = new User();
        $usuario->cuenta = $request->cuenta;
        $usuario->email = $request->email;
        $usuario->estado = 0;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        $user_empleado = new UserEmpleado();
        $user_empleado->user_id = $usuario->id;
        $user_empleado->empleado_id = $request->id_empleado;
        $user_empleado->save();

        $user_rol = new UserRol();
        $user_rol->user_id = $usuario->id;
        $user_rol->rol_id = $request->id_rol;
        $user_rol->save();

        // return redirect()->intended('/oficina/create')->with('estado', 1);
        return redirect()->back()->with('mensaje', "se ha creado correctamente")->with('alerta', "alert-success");
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
        $usuario = User::find($id);
        if(Hash::check($request->password, $usuario->password)){
            $usuario->cuenta = $request->cuenta;
            $usuario->email = $request->email;
            if($request->new_password != null){
                $usuario->password = Hash::make($request->new_password);
            }
            $usuario->save();
            $user_rol = $usuario->UserRol;
            $user_rol->rol_id = $request->id_rol;
            $user_rol->save();
        // return redirect()->intended('/oficina/create')->with('estado', 1);

            return redirect()->back()->with('mensaje', "se ha actualizado correctamente")->with('alerta', 'alert-success');
        }else
            return redirect()->back()->with('mensaje', "Contraseña Incorrecta, vuelva a intentar")->with('alerta', 'alert-danger');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $user_rol = UserRol::find($usuario->UserRol->id);
        $user_rol->delete();
        if($usuario->UserEmpleado){
            $user_empleado = UserEmpleado::find($usuario->UserEmpleado->id);
            $user_empleado->delete();
        }

        $usuario->delete();
        return redirect()->intended('usuario')->with('mensaje', "Se ha eliminado correctamente.");
    }
}
