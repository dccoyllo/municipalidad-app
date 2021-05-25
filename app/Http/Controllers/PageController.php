<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\RolModulo;
// use App\Models\RolModulo;
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
            $request->session()->put('modulo', Modulo::all());
            $request->session()->put('rolmodulo', RolModulo::all());
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
