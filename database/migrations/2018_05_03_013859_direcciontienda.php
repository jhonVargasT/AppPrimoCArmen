<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Direcciontienda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciontienda', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';

            $table->increments('idDireccionTienda')->unique();
            $table->string('nombreCalle')->nullable();
            $table->string('provincia')->nullable();
            $table->string('distrito')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->dateTime('fechaActualizacion')->nullable();
            $table->integer('idUsuario')->nullable();
            $table->integer('estado')->default('1');

            $table->integer('id_Tienda')->unsigned()->nullable();
        });

        Schema::table('direcciontienda', function( $table) {
            $table->foreign('id_Tienda')->references('idTienda')->on('tienda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('direcciontienda');
    }
}
