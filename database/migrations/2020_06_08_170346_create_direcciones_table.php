<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('id_usuario')->nullable();

                $table->string('alias');
                $table->string('nif');
                $table->string('nombre');
                $table->string('apellidos');
                $table->string('direccion');
                $table->string('pais');
                $table->string('provincia');
                $table->string('codigo_postal');
                $table->string('poblacion');
                $table->integer('telefono');



                $table->timestamps();
            });

            Schema::table('direcciones', function($table) {
                $table->foreign('id_usuario')->references('id')->on('users');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
