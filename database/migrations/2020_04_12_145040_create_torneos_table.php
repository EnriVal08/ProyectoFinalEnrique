<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->unsignedBigInteger('id_juego')->nullable();
            $table->string('foto');
            $table->string('fecha');
            $table->string('ubicacion');
            $table->string('descripcion', 1000);
            $table->integer('premio');

            $table->timestamps();
        });

        Schema::table('torneos', function($table) {
            $table->foreign('id_juego')->references('id')->on('juegos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('torneos');
    }
}
