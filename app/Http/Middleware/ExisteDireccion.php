<?php

namespace App\Http\Middleware;

use App\Direcciones;
use Closure;
use Illuminate\Support\Facades\DB;

class ExisteDireccion
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

        $direccion = DB::table('direcciones')
            ->where('id_usuario', auth()->id())
            ->first();

        if($direccion == null){

            flash('Debes añadir una direccion de envío antes de finalizar la compra');

            return redirect()->back();

        }

        return $next($request);
    }
}
