<?php

namespace App\Http\Middleware;

use Closure;

class ComprobarCompra
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

        if(session('productos')==null){
            flash('Necesitas completar el pago')->error();

            return redirect('cesta');
        }

        return $next($request);
    }
}
