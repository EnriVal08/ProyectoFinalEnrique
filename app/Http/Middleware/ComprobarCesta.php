<?php

namespace App\Http\Middleware;

use App\Cesta;
use Closure;

class ComprobarCesta
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

        $cesta = Cesta::all()->where('id_usuario', '=', auth()->id());

        if(count($cesta)<1){

            flash('Debes de tener productos en tu cesta para poder comprar')->error()->important();

            return redirect('/cesta');

        }



        return $next($request);
    }
}
