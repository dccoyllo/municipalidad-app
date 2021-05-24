<?php

namespace App\Http\Controllers;

use App\Models\Rol_Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Mod;

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
            $request->session()->put('modulo', Rol_Modulo::all());
            $request->session()->regenerate();
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
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

 
}
