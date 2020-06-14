<?php

namespace App\Http\Controllers;

use App\Cesta;
use App\Comentario;
use App\Direcciones;
use App\Equipo;
use App\Juego;
use App\Jugador;
use App\Noticia;
use App\Pedidos;
use App\Producto;
use App\Torneo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use function GuzzleHttp\Promise\all;

class PaginaController extends Controller
{
    public function getIndex()
    {
        $juegos = Juego::all();

        /*Para poner el primer juego como active en el carousel*/
        $primerJuego = Juego::first();

        $noticias = Noticia::take(3)->orderby('id', 'DESC')->get();

        $torneos = Torneo::all();

        return view('pagina.index')->with(compact('juegos'))->with('primerJuego', $primerJuego)->with(compact('noticias'))->with(compact('torneos'));
    }

    public function getNoticias()
    {

        $noticias = Noticia::paginate(4);
        $ultimas_noticias = Noticia::take(5)->orderby('id', 'DESC')->get();

        return view('pagina.noticias')->with(compact('noticias'))->with(compact('ultimas_noticias'));
    }

    public function getNoticiaIndividual($id)
    {

        $noticia = Noticia::findOrFail($id);


        $autor = Noticia::find($noticia->id_creador)->usuario;

        return view('pagina.noticiaindividual', array('noticia' => $noticia), array('autor' => $autor));
    }


    public function getJuego($id)
    {


        $juego = Juego::findOrFail($id);


        return view('pagina.juego', array('juego' => $juego));
    }

    public function getTorneos()
    {


        $torneos = Torneo::all();


        return view('pagina.torneos')->with(compact('torneos'));
    }


    public function getTorneoIndividual($id)
    {

        $torneo = Torneo::findOrFail($id);


        return view('pagina.torneoindividual', array('torneo' => $torneo));
    }

    public function getTienda()
    {

        $productos = Producto::paginate(3);

        return view('pagina.tienda')->with(compact('productos'));


    }

    public function getProducto($id)
    {

        $producto = Producto::findOrFail($id);

        return view('pagina.detallesproducto', array('producto' => $producto));
    }


    public function getCesta()
    {

        $id_usuario = auth()->id();


        $cesta = Cesta::all()->where('id_usuario', '=', $id_usuario);


        $total = $this->total();




        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");


        $fecha = Carbon::now();


        /*Fecha inicial envío*/


        $suma = $fecha->addDay(5);

        $mes = $meses[($suma->format('n')) - 1];

        $envio = $suma->format('d') . ' de ' . $mes;


        /*Fecha límite envío*/

        $suma2 = $fecha->addDay(8);

        $mes2 = $meses[($suma2->format('n')) - 1];

        $envio2 = $suma2->format('d') . ' de ' . $mes2;


        /*Fechas tiempo de envío estimado*/

        $envioFinal = $envio . ' - ' . $envio2;

        return view('pagina.cesta', array('cesta' => $cesta), compact('total', 'envioFinal'));


    }


    public function update($producto, $cantidad)
    {

        $cesta = Cesta::find($producto);

        $cesta->cantidad = $cantidad;

        $cesta->save();

        return redirect('cesta');

    }


    public function total()
    {

        $id_usuario = auth()->id();


        $cesta = Cesta::all()->where('id_usuario', '=', $id_usuario);


        $total = 0;

        foreach ($cesta as $productos) {
            foreach ($productos->productos as $producto) {
                $total += $producto->precio * $productos->cantidad;
            }
        }

        return $total;
    }


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


    public function añadir(Request $request)
    {

        $id_usuario = auth()->id();

            $cesta = Cesta::all()->where('id_usuario', '=', $id_usuario);

            $existe = false;
            foreach ($cesta as $productoCesta) {
                if ($productoCesta->id_producto == $request->id_producto) {

                    $existe = true;

                    $productoCesta->update([
                        'cantidad' => $productoCesta->cantidad + $request->input('cantidad'),
                    ]);


                }
            }

            if ($existe) {

                flash('Producto añadido a tu cesta correctamente')->info();

                return redirect('/producto/' . $request->id_producto);


            } else {

                $productoNuevo = new Cesta();

                $productoNuevo->id_producto = $request->id_producto;
                $productoNuevo->id_usuario = $id_usuario;
                $productoNuevo->cantidad = $request->cantidad;

                $productoNuevo->save();

                flash('Producto añadido a tu cesta correctamente')->info();

                return redirect('/producto/' . $request->id_producto);

            }




    }

    public function eliminar($id)
    {


        $cesta = Cesta::findOrFail($id);


        $cesta->delete();
        return redirect('/cesta');


    }


    public function getJugador($id)
    {

        $jugador = Jugador::findOrFail($id);


        $equipo = Jugador::find($jugador->id)->equipo;


        return view('pagina.jugador', array('jugador' => $jugador), array('equipo' => $equipo));


    }


    public function getEquipo($id){

            $equipos = Equipo::findOrFail($id);


            return view('pagina.equipos', array('equipo' => $equipos));


    }

    public function getTodosEquipos(){

        $equipos = Equipo::all();

        return view('pagina.todosequipos', array('equipos' => $equipos));



    }

    public function getTodosJugadores(){

        $jugadores = Jugador::paginate(9);

        return view('pagina.todosjugadores', array('jugadores' => $jugadores));



    }


    public function getComprar(){

        $id_usuario = auth()->id();


        $direccion = DB::table('direcciones')
            ->where('id_usuario', $id_usuario)
            ->first();

        $cesta = Cesta::all()->where('id_usuario', '=', $id_usuario);

        $total = $this->total();

        return view('pagina.comprar', array('direccion' => $direccion), array('cesta' => $cesta))->with(compact('total'));

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

    public function editarDireccion(Request $request){

        $this->validate($request, [
            'pais' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);


        $direccion = Direcciones::find($request->input('id'));

        $direccion->pais = $request->input('pais');
        $direccion->provincia = $request->input('provincia');
        $direccion->alias = $request->input('alias');
        $direccion->nif = $request->input('nif');
        $direccion->nombre = $request->input('nombreD');
        $direccion->apellidos = $request->input('apellidos');
        $direccion->direccion = $request->input('direccion');
        $direccion->codigo_postal = $request->input('codigo_postal');
        $direccion->poblacion = $request->input('poblacion');
        $direccion->telefono = $request->input('telefono');


        $direccion->save();


        return redirect('comprar');
    }

    public function getContrareembolso(){
        $id_usuario = auth()->id();

        $direccion = DB::table('direcciones')
            ->where('id_usuario', $id_usuario)
            ->first();
        $cesta = session('productos');


        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");


        $fecha = Carbon::now();


        /*Fecha inicial envío*/


        $suma = $fecha->addDay(5);

        $mes = $meses[($suma->format('n')) - 1];

        $envio = $suma->format('d') . ' de ' . $mes;

        return view('pagina.contrareembolso', array('direccion' => $direccion), array('cesta' => $cesta))->with(compact('envio'));
    }


    public function añadirDireccion(Request $request){

        $this->validate($request, [
            'pais' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',

        ]);


        $direccion = new Direcciones();

        $direccion->pais = $request->pais;
        $direccion->id_usuario = auth()->id();
        $direccion->provincia = $request->provincia;
        $direccion->alias = $request->alias;
        $direccion->nif = $request->nif;
        $direccion->nombre = $request->nombreD;
        $direccion->apellidos = $request->apellidos;
        $direccion->direccion = $request->direccion;
        $direccion->codigo_postal = $request->codigo_postal;
        $direccion->poblacion = $request->provincia;
        $direccion->telefono = $request->telefono;



        $direccion->save();

        return redirect('comprar');


    }

    public function getPerfil(){


        $usuario = DB::table('users')
            ->where('id', auth()->id())
            ->first();


        return view('pagina.perfil')->with(compact('usuario'));


    }

    public function getHistorialPedidos(){


        $pedidos = Pedidos::where('id_cliente', '=', auth()->id())->paginate(1);

        return view('pagina.historialPedidos')->with(compact( 'pedidos'));

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

    public function añadirJuego(Request $request){

        /*
        $this->validate($request, [
            'nombre' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);
*/

        $juego = new Juego();

        $juego->nombre = $request->nombreJuego;
        $juego->titulo = $request->tituloJuego;
        $juego->descripcion = $request->descripcionJuego;
        $juego->foto = $request->fotoJuego;
        $juego->video = $request->videoJuego;

        if ($request->file('logoJuego') != NULL){
            $juego->logo = $request->file('logoJuego')->move('images', $request->file('logoJuego')->getClientOriginalName());
        }


        $juego->save();

        return redirect('/');


    }

    public function añadirNoticia(Request $request){

        /*
        $this->validate($request, [
            'nombre' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);
*/

        $noticia = new Noticia();

        $noticia->titulo = $request->tituloNoticia;
        $noticia->descripcion = $request->descripcionNoticia;
        $noticia->fecha = $request->fechaNoticia;
        $noticia->foto = $request->fotoNoticia;

        $noticia->id_creador = auth()->id();



        $noticia->save();

        return redirect('/');


    }


    public function añadirTorneo(Request $request){

        /*
        $this->validate($request, [
            'nombre' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);
*/

        $torneo = new Torneo();

        $torneo->titulo = $request->tituloTorneo;
        $torneo->id_juego = $request->id_juego;
        $torneo->foto = $request->fotoTorneo;
        $torneo->fecha = $request->fechaTorneo;
        $torneo->ubicacion = $request->ubicacionTorneo;
        $torneo->descripcion = $request->descripcionTorneo;
        $torneo->premio = $request->premioTorneo;
        $torneo->logo = $request->logoTorneo;
        $torneo->link = $request->linkTorneo;

        $torneo->save();

        return redirect('/');


    }


    public function editarNoticia(Request $request){

        /*
        $this->validate($request, [
            'nombre' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);
*/

        $noticia = Noticia::find($request->input('id_noticia'));

        $noticia->titulo = $request->tituloEditarNoticia;
        $noticia->descripcion = $request->descripcionEditarNoticia;
        $noticia->fecha = $request->fechaEditarNoticia;
        $noticia->foto = $request->fotoEditarNoticia;




        $noticia->save();

        return redirect()->back();


    }

    public function eliminarNoticia($id){


        $noticia = Noticia::find($id);

        $comentarios = Comentario::where('id_noticia', $id)->delete();

        $noticia->delete();

        return redirect('noticias');


    }


    public function editarJuego(Request $request){

        /*
        $this->validate($request, [
            'nombre' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);
*/

        $juego = Juego::find($request->input('id_juego'));

        $juego->nombre = $request->nombreEditarJuego;
        $juego->titulo = $request->tituloEditarJuego;
        $juego->descripcion = $request->descripcionEditarJuego;
        $juego->foto = $request->fotoEditarJuego;
        $juego->video = $request->videoEditarJuego;

        if ($request->file('logoEditarJuego') != NULL){
            $juego->logo = $request->file('logoEditarJuego')->move('images', $request->file('logoEditarJuego')->getClientOriginalName());
        }



        $juego->save();

        return redirect()->back();


    }


    public function eliminarJuego($id){


        $juego = Juego::find($id);


        $torneoJuego = $juego->torneo;

        if ($torneoJuego != NULL){
            return redirect('/');
        }


        $juego->delete();

        return redirect('/');


    }


    public function editarTorneo(Request $request){

        /*
        $this->validate($request, [
            'nombre' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);
*/

        $torneo = Torneo::find($request->input('id_torneo'));

        $torneo->titulo = $request->tituloEditarTorneo;
        $torneo->id_juego = $request->id_juegoEditar;
        $torneo->foto = $request->fotoEditarTorneo;
        $torneo->fecha = $request->fechaEditarTorneo;
        $torneo->ubicacion = $request->ubicacionEditarTorneo;
        $torneo->descripcion = $request->descripcionEditarTorneo;
        $torneo->premio = $request->premioEditarTorneo;
        $torneo->logo = $request->logoEditarTorneo;
        $torneo->link = $request->linkEditarTorneo;

        $torneo->save();

        return redirect()->back();


    }


    public function eliminarTorneo($id){


        $torneo = Torneo::find($id);


        $equipos_juegan_torneos = DB::delete('delete from equipos_juegan_torneos where id_torneo = '.$torneo->id);


        $torneo->delete();

        return redirect('torneos');


    }




    public function añadirEquipoAlTorneo(Request $request){


        DB::table('equipos_juegan_torneos')->insert([
            ['id_torneo' =>  $request->input('id_torneo'), 'id_equipo' => $request->input('id_equipo')]
        ]);

        return redirect()->back();


    }


    public function eliminarEquipoParticipante($idequipo, $idtorneo){



        DB::delete('delete from equipos_juegan_torneos where id_equipo = '.$idequipo.' AND id_torneo = '. $idtorneo);



        return redirect()->back();


    }


    public function editarEquipo($id, Request $request){

        $equipo = Equipo::find($id);

        $equipo->nombre = $request->nombreEditarEquipo;
        $equipo->logo = $request->logoEditarTorneo;
        $equipo->pais = $request->paisEditarTorneo;
        $equipo->descripcion = $request->descripcionEditarTorneo;
        $equipo->fondo = $request->fondoEditarTorneo;

        $equipo->save();

        return redirect()->back();


    }



    public function eliminarEquipo($id){


        $equipo = Equipo::find($id);

        DB::delete('delete from equipos_juegan_torneos where id_equipo = '.$id);

        $jugadores = Jugador::where('id_equipo', $id)->update(['id_equipo' => NULL]);;


        $equipo->delete();

        return redirect('torneos');


    }

    public function editarJugador($id, Request $request){

        $jugador = Jugador::find($id);

        $jugador->nombre = $request->nombreEditarJugador;
        $jugador->nombre_completo = $request->nombreCompletoEditarJugador;
        $jugador->id_equipo = $request->id_equipoJugador;

        $jugador->edad = $request->edadEditarJugador;
        $jugador->pais = $request->paisEditarJugador;
        $jugador->descripcion = $request->descripcionEditarJugador;
        $jugador->fondo = $request->fondoEditarJugador;

        if ($request->file('imagenEditarJugador') != NULL){
            $jugador->foto = $request->file('imagenEditarJugador')->move('images', $request->file('imagenEditarJugador')->getClientOriginalName());
        }


        $jugador->save();

        return redirect()->back();


    }

    public function eliminarJugador($id){


        $jugador = Jugador::find($id);


        $jugador->delete();

        return redirect('torneos');


    }

    public function eliminarJugadorDelEquipo($id){


        $jugador = Jugador::where('id', $id)->update(['id_equipo' => NULL]);


        return redirect('torneos');


    }


    public function añadirProducto(Request $request){

        /*
        $this->validate($request, [
            'nombre' => 'required',
            'provincia' => 'required',
            'alias' => 'required',
            'nif' => 'required',
            'nombreD' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'poblacion' => 'required',
            'telefono' => 'required',
        ]);
*/

        $producto = new Producto();

        $producto->nombre = $request->nombreProducto;
        $producto->precio = $request->precioProducto;
        $producto->foto = $request->fotoProducto;
        $producto->descripcion = $request->descripcionProducto;
        $producto->categoria = $request->categoriaProducto;

        $producto->save();

        return redirect('/');


    }

    public function editarProducto($id, Request $request){

        $producto = Producto::find($id);

        $producto->nombre = $request->nombreEditarProducto;
        $producto->precio = $request->precioEditarProducto;
        $producto->foto = $request->fotoEditarProducto;
        $producto->categoria = $request->categoriaEditarProducto;
        $producto->descripcion = $request->descripcionEditarProducto;


        $producto->save();

        return redirect()->back();


    }

    public function eliminarProducto($id){


        $producto = Producto::find($id)->delete();


        return redirect('tienda');



    }

}


