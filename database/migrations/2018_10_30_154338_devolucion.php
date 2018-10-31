<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class devolucion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolucion', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';
            $table->increments('idDevolucion')->unique();
            $table->string('motivo')->nullable();
            $table->integer('cantidadUnidades')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->integer('devuelto')->default('0');
            $table->integer('estado')->default('1');
            $table->integer('id_Producto')->unsigned()->nullable();
        });
        Schema::table('producto', function( $table) {
            $table->foreign('id_Producto')->references('idProducto')->on('producto');
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
