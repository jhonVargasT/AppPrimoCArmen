<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productopedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productopedido', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';

            $table->increments('idProductoPedido')->unique();
            $table->string('cantidadUnidades')->nullable();
            $table->double('montoUnidades')->nullable();
            $table->double('DescuentoUnidades')->nullable();
            $table->string('cantidadPaquetes')->nullable();
            $table->double('montoPaquetes')->nullable();
            $table->double('DescuentoPaquetes')->nullable();
            $table->integer('idUsuario')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->integer('estado')->default('1');
            $table->integer('id_Producto')->unsigned()->nullable();
            $table->integer('id_Pedido')->unsigned()->nullable();
            $table->integer('id_Promocion')->unsigned()->nullable();
        });

        Schema::table('productopedido', function( $table) {
            $table->foreign('id_Promocion')->references('idPromocion')->on('promocion');
            $table->foreign('id_Producto')->references('idProducto')->on('producto');
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
        Schema::drop('productopedido');
    }
}
