<?php

namespace App\Http\Middleware;

use Closure;

class areamdw
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
      if($this->auth->user()->id_rol == 1):       
         $next($request);
      endif;
        return redirect('/login');
        
     
    }
}
