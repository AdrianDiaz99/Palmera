<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cosechasxcontenedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cosechasxcontenedor', function (Blueprint $table) {
            $table->string('idPalmera');
            $table->foreign('idPalmera')->references('IdPalmera')->on('Cosechas');
            $table->string('Año', 4)->references('Año')->on('Cosechas');;
            $table->foreignId('Consecutivo')->references('Consecutivo')->on('Cosechas');
            $table->foreignId('ConID')->references('ConID')->on('Contenedores');
            $table->double('KilosDepositados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('Cosechasxcontenedor');

    }
}
