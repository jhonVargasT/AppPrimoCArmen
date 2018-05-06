<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Persona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';

            $table->increments('idPersona')->unique();
            $table->string('dni')->nullable();
            $table->string('ruc')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('fechaNacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('nroCelular')->nullable();
            $table->string('correo')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->integer('estado')->default('1');
            $table->string('fechaActualizacion')->nullable();
            $table->integer('usuarioCreacion')->nullable();
            $table->string('departamento')->nullable();
            $table->string('provincia')->nullable();
            $table->string('distrito')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('persona');
    }
}
