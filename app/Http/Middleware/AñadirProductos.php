<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AñadirProductos
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

        if (!Auth::check()){
            flash('Debes de iniciar sesión para añadir productos a tu cesta');
            return redirect()->back();
        }

        return $next($request);
    }
}
