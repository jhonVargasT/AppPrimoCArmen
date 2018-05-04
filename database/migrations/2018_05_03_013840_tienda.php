<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tienda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tienda', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';

            $table->increments('idTienda')->unique();
            $table->string('nombreTienda')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('usuarioCreacion')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->dateTime('fechaActualizacion')->nullable();
            $table->integer('idUsuario')->nullable();
            $table->integer('estado')->default('1');

            $table->integer('id_Persona')->unsigned()->nullable();
        });

        Schema::table('tienda', function( $table) {
            $table->foreign('id_Persona')->references('idPersona')->on('persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tienda');
    }
}
