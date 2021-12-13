<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contenedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Contenedores', function (Blueprint $table) {
            $table->id('ConID');
            $table->foreignId('idDatil')->references('idDatil')->on('Datiles');
            $table->bigInteger('Capacidad');
            $table->double('KilosAlmacenados');
            $table->double('KilosVendidos');
            $table->timestamp('FechaCaducidad')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('Contenedores');

    }
}
