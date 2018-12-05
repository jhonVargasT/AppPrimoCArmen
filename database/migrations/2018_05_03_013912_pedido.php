<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';
            $table->increments('idPedido')->unique();
            $table->dateTime('fechaEntrega')->nullable();
            $table->dateTime('fechaPedido')->nullable();
            $table->integer('estadoPedido')->nullable();
            $table->integer('idPersona')->nullable();
            $table->string('usuarioEliminacion')->nullable();
            $table->string('razonEliminar')->nullable();
            $table->double('costoBruto')->nullable();
            $table->double('impuesto')->nullable();
            $table->double('descuento')->nullable();
            $table->double('totalPago')->nullable();
            $table->integer('idUsuario')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->integer('estado')->default('1');
            $table->integer('lugar')->nullable();
            $table->integer('id_DireccionTienda')->unsigned()->nullable();

        });

        Schema::table('pedido', function( $table) {
            $table->foreign('id_DireccionTienda')->references('idDireccionTienda')->on('direcciontienda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pedido');
    }
}
