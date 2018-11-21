<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productopromocion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productopromocion', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';
            $table->increments('idProductoPromocion')->unique();
            $table->integer('id_Producto')->unsigned()->nullable();
            $table->integer('id_Promocion')->unsigned()->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->integer('activoCaja')->default('0');
            $table->integer('activoUnidad')->default('0');
        });

        Schema::table('productopromocion', function( $table) {
            $table->foreign('id_Producto')->references('idProducto')->on('producto');
            $table->foreign('id_Promocion')->references('idPromocion')->on('promocion');
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
