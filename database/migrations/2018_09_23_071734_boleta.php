<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Boleta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleta', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';
            $table->increments('idBoleta')->unique();
            $table->integer('idUsuario')->nullable();
            $table->integer('idcliente')->nullable();
            $table->string('nroboleta')->nullable();
            $table->string('montoletras')->nullable();
            $table->integer('tipocomprobante')->nullable();
            $table->integer('nroimpresiones')->nullable();
            $table->dateTime('fechaEntrega')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->integer('entregado')->default('0');
            $table->integer('estado')->default('1');
            $table->integer('id_Pedido')->unsigned()->nullable();
        });

        Schema::table('boleta', function( $table) {
            $table->foreign('id_Pedido')->references('idPedido')->on('pedido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
