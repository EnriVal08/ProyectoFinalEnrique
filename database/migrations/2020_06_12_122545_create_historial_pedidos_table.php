<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_pedido')->nullable();

            $table->unsignedBigInteger('id_producto')->nullable();

            $table->timestamps();
        });

        Schema::table('historial_pedidos', function($table) {
            $table->foreign('id_pedido')->references('id')->on('pedidos');
        });

        Schema::table('historial_pedidos', function($table) {
            $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_pedidos');
    }
}
