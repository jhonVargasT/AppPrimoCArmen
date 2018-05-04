<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';

            $table->increments('idProducto')->unique();
            $table->string('nombre')->nullable();
            $table->string('tipoProducto')->nullable();
            $table->string('tipoPaquete')->nullable();
            $table->integer('cantidadPaquete')->nullable();
            $table->integer('cantidadProductosPaquete')->nullable();
            $table->double('precioCompra')->nullable();
            $table->double('precioVenta')->nullable();
            $table->double('comisionPaquete')->nullable();
            $table->integer('cantidadStockUnidad')->nullable();
            $table->double('precioCompraUnidad')->nullable();
            $table->double('precioVentaUnidad')->nullable();
            $table->double('descuento')->nullable();
            $table->integer('idUsuario')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->integer('estado')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('producto');
    }
}
