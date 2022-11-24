<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloJefe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->rol === "admin" || "SuperAdmin") {
            return $next($request);
        } else {
            return redirect()->back()->with("mensaje", "No puedes acceder al módulo seleccionado");
        }
       
    }
}
