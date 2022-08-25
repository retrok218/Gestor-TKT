<?php

namespace App\Http\Middleware;

use Closure;

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
      dd("hola estas en e midelware de admin ");

            return $next($request);
          
       
        
    }
}
