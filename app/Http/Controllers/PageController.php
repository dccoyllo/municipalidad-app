<?php

namespace App\Http\Controllers;

use App\Models\RolModulo;
use App\Models\UserEmpleado;
use App\Models\UserRol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    function getLogin()
    {
        return view('login');
    }
    
    function dataLogin(Request $request)
    {
        $request->validate([
            'cuenta' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('cuenta', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->put('user_empleado', UserEmpleado::all());
            $request->session()->put('user_rol', UserRol::all());
            $request->session()->put('rol_modulo', RolModulo::all());
            $request->session()->regenerate();

            $usuario = User::find(Auth::user()->id);
            $usuario->estado = true;
            $usuario->save();
            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'mensaje' => 'Cuenta y/o Contraseña incorrecta',
        ]);
    }

    function getInicio()
    {
        return view('inicio');
    }

    public function logout(Request $request)
    {
        $usuario = User::find(Auth::user()->id);
            $usuario->estado = false;
            $usuario->save();
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect('/login');
    }

 
}
