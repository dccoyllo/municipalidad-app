<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Logistica
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->UserRol->rol->id_rol == 2)
           return $next($request);

        return redirect('/error404');
    }
}
