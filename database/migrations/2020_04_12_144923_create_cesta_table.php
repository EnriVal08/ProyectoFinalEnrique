<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cesta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_producto')->nullable();

            $table->unsignedBigInteger('id_usuario')->nullable();

            $table->timestamps();
        });

        Schema::table('cesta', function($table) {
            $table->foreign('id_producto')->references('id')->on('productos');
        });

        Schema::table('cesta', function($table) {
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
        Schema::dropIfExists('cesta');
    }
}
