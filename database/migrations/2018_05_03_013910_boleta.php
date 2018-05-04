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
            $table->dateTime('fechaCreacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boleta');
    }
}
