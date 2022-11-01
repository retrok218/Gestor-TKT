<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;


class AreaMiddleware
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
   //dd(Auth::user());
    if(Auth::user()->permission_id == false){    
     
      return $next($request);
    }else{
      return Redirect::route('asignados');
    }               
  }
}
