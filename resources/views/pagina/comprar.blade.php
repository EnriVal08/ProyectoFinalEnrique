@extends('layouts.master')
@section('content')

   <section class="tienda cesta">

       <div class="container">


           <a class="btn purple-gradient" data-toggle="modal" data-target="#modalContactForm">Añade el tuyo</a>

   <form method="POST" action="">

       {{csrf_field()}}

       <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header text-center">
                       <h4 class="modal-title w-100 font-weight-bold">Añadir Direccion</h4>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body mx-3">
                       <div class="md-form mb-5">
                           <i class="fas fa-user prefix grey-text"></i>
                           <input type="text" id="nombre" name="nombre" class="form-control validate">
                           <label data-error="wrong" data-success="right" for="nombre">Alias</label>
                       </div>

                       <div class="md-form mb-5">
                           <i class="fas fa-envelope prefix grey-text"></i>
                           <input type="email" id="email" name="email" class="form-control validate">
                           <label data-error="wrong" data-success="right" for="email">CIF/NIF/NIE</label>
                       </div>

                       <div class="md-form mb-5">
                           <i class="fas fa-envelope prefix grey-text"></i>
                           <input type="text" id="nombre" name="nombre" class="form-control validate">
                           <label data-error="wrong" data-success="right" for="email">Nombre</label>
                       </div>

                       <div class="md-form mb-5">
                           <i class="fas fa-envelope prefix grey-text"></i>
                           <input type="text" id="apellidos" name="apellidos" class="form-control validate">
                           <label data-error="wrong" data-success="right" for="email">Apellidos</label>
                       </div>

                       <div class="md-form mb-5">
                           <i class="fas fa-envelope prefix grey-text"></i>
                           <input type="text" id="direccion" name="direccion" class="form-control validate">
                           <label data-error="wrong" data-success="right" for="email">Direccion</label>
                       </div>

                       <div class="md-form mb-5">
                           <i class="fas fa-envelope prefix grey-text"></i>
                           <input type="text" id="pais" name="pais" class="form-control validate">
                           <label data-error="wrong" data-success="right" for="email">País</label>
                       </div>

                       <div class="md-form mb-5">
                           <i class="fas fa-envelope prefix grey-text"></i>
                           <input type="text" id="provincia" name="provincia" class="form-control validate">
                           <label data-error="wrong" data-success="right" for="email">Elige provincia</label>
                       </div>

                       <div class="md-form mb-5">
                           <i class="fas fa-envelope prefix grey-text"></i>
                           <input type="text" id="codigo_postal" name="codigo_postal" class="form-control validate">
                           <label data-error="wrong" data-success="right" for="email">Código Postal</label>
                       </div>

                       <div class="md-form mb-5">
                           <i class="fas fa-envelope prefix grey-text"></i>
                           <input type="text" id="poblacion" name="poblacion" class="form-control validate">
                           <label data-error="wrong" data-success="right" for="email">Población</label>
                       </div>

                       <div class="md-form mb-5">
                           <i class="fas fa-envelope prefix grey-text"></i>
                           <input type="text" id="telefono" name="telefono" class="form-control validate">
                           <label data-error="wrong" data-success="right" for="email">Teléfono</label>
                       </div>



                   </div>
                   <div class="modal-footer d-flex justify-content-center">
                       <button type="submit" class="btn purple-gradient">Publicar <i class="fas fa-paper-plane-o ml-1"></i></button>
                   </div>
               </div>
           </div>
       </div>
   </form>

       </div>

   </section>

@endsection
