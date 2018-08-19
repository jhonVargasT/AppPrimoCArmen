<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tipopaquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tipopaquete', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';

            $table->increments('idTipoPaquete')->unique();
            $table->string('nombre')->nullable();
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
        Schema::drop('Tipopaquete');
    }
}
