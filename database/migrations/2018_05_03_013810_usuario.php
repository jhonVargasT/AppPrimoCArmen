<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';

            $table->increments('idUsuario')->unique();
            $table->string('password')->nullable();
            $table->string('usuario')->nullable();
            $table->string('passwordAntigua')->nullable();
            $table->dateTime('fechaCambioPassword')->nullable();
            $table->integer('tipoUsuario')->nullable();
            $table->integer('usuarioCreacion')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->integer('estado')->default('1');

            $table->integer('id_Persona')->unsigned()->nullable();
        });

        Schema::table('usuario', function( $table) {
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
        Schema::drop('usuario');
    }
}
