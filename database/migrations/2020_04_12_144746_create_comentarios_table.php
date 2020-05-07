<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion', 1000);

            $table->unsignedBigInteger('id_noticia')->nullable();

            $table->string('nombre_usuario', 1000);

            $table->string('email_usuario', 1000);


            $table->timestamps();
        });

        Schema::table('comentarios', function($table) {
            $table->foreign('id_noticia')->references('id')->on('noticias');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
