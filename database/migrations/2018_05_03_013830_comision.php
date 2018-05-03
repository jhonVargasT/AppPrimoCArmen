<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comision extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comision', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';

            $table->increments('idComision')->unique();
            $table->integer('mes')->nullable();
            $table->integer('year')->nullable();
            $table->double('monto')->nullable();
            $table->dateTime('fechaActualizacion')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->integer('estado')->default('1');

            $table->integer('id_Usuario')->unsigned()->nullable();
        });

        Schema::table('comision', function( $table) {
            $table->foreign('id_Usuario')->references('idUsuario')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comision');
    }
}
