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
            $table->string('nroboleta')->nullable();
            $table->string('montoletras')->nullable();
            $table->string('vendedor')->nullable();
            $table->string('tipoVenta')->nullable();
            $table->string('dnioruc')->nullable();
            $table->string('clienterazonsocial')->nullable();
            $table->string('direccion')->nullable();
            $table->string('moneda')->nullable();
            $table->string('documento')->nullable();
            $table->string('serie')->nullable();
            $table->string('numero')->nullable();
            $table->string('tipocomprobante')->nullable();
            $table->dateTime('fechaEntrega')->nullable();
            $table->integer('entregado')->default('1');
            $table->integer('estado')->default('1');
            $table->integer('id_Pedido')->unsigned()->nullable();
        });

        Schema::table('boleta', function ($table) {
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
