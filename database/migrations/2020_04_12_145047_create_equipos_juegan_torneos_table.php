<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposJueganTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos_juegan_torneos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_torneo')->nullable();

            $table->unsignedBigInteger('id_equipo')->nullable();

            $table->timestamps();
        });

        Schema::table('equipos_juegan_torneos', function($table) {
            $table->foreign('id_torneo')->references('id')->on('torneos');
        });

        Schema::table('equipos_juegan_torneos', function($table) {
            $table->foreign('id_equipo')->references('id')->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos_juegan_torneos');
    }
}
