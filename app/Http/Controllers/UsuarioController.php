<?php

namespace App\Http\Controllers;

use App\Cesta;
use App\Direcciones;
use App\Pedidos;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function registrarUsuario(Request $request)
    {

        $this->validate($request, [
            'nombre' => 'required|max:10|min:4',
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($request->input('password') != $request->input('password_confirmation')){
            flash('Las contraseñas no coinciden')->error()->important();

            return redirect('/register');
        }

        $email = $request->input('email');

        if (User::where('email', $email)->exists()) {
            flash('El usuario que has introducido ya se encuentra registrado en nuestra base de datos')->error()->important();
            return redirect('/register');
        } else {

            $user = new User();

            $user->nombre = $request->input('nombre');
            $user->email = $email;
            $user->password = bcrypt($request->input('password'));
            $user->rol = 'cliente';


            if ($request->file('foto') != NULL){
                $user->avatar = $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
            } else{
                $user->avatar = 'images/avatarDefault.png';
            }

            $user->save();

            flash('Registro completado correctamente')->info();

            return redirect('/login');
        }
    }


    public function eliminarCesta(){

        $status = session('status');

        $id_usuario = auth()->id();

        $productos = Cesta::all()->where('id_usuario', '=', $id_usuario);


        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");


        $fecha = Carbon::now();


        /*Fecha inicial envío*/


        $suma = $fecha->addDay(5);

        $mes = $meses[($suma->format('n')) - 1];

        $envio = $suma->format('d') . ' de ' . $mes;


        $pedido = new Pedidos();


        $pedido->id_cliente = $id_usuario;
        $pedido->fecha = $envio;

        $pedido->save();



        $pedidoNuevo = DB::table('pedidos')->where('id_cliente', '=', $id_usuario)->where('fecha', '=', $envio)->latest()->get();



        foreach ($productos as $productosUsuario){
            foreach($productosUsuario->productos as $producto){

                DB::table('historial_pedidos')->insert([
                    ['id_pedido' =>  $pedidoNuevo[0]->id, 'id_producto' => $producto->id, "cantidad" => $productosUsuario->cantidad]
                ]);

            }


        }



        DB::delete('delete from cesta where id_usuario = '. $id_usuario);

        if(session('pagoCon') == 'paypal'){
            return redirect('cesta')->with(compact('status'));
        } else{
            return redirect('contrareembolso')->with(compact('productos'));
        }


    }



    public function getPerfil(){


        $usuario = DB::table('users')
            ->where('id', auth()->id())
            ->first();


        return view('pagina.perfil')->with(compact('usuario'));


    }

    public function modificarPerfil(Request $request){

        $this->validate($request, [
            'nombre' => 'required|max:10|min:4',
            'email' => 'required',
        ]);


        $usuario = User::findOrFail(auth()->user()->id);


        if((auth()->user()->email == $request->email) && (auth()->user()->nombre == $request->nombre) && ($request->file('foto') == NULL)){

        } else{

            if ((User::where('email', $request->email)->exists()) && (auth()->user()->email != $request->email)) {
                flash('El email que has introducido ya se encuentra registrado en nuestra base de datos')->error()->important();
                return redirect('perfil');
            }

            $usuario->nombre = $request->input('nombre');
            $usuario->email = $request->input('email');

            if ($request->file('foto') != NULL){
                $usuario->avatar = $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
            }

            $usuario->save();

            flash("Se han modificado correctamente tus datos")->success();
            return redirect('perfil');

        }



        return redirect('perfil');



    }

}
