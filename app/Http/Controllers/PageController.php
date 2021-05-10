<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function getLogin()
    {
        return view('login');
    }

    function getInicio()
    {
        return view('inicio');
    }

 
}
