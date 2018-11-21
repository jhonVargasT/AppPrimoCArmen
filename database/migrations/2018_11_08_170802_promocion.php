<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Promocion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocion', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';
            $table->increments('idPromocion')->unique();
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            $table->double('descuento')->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->dateTime('fechaVigencia')->nullable();
            $table->integer('activo')->default('1');
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
        //
    }
}
