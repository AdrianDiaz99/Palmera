<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarritoDeComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('ProductosCarrito', function (Blueprint $table) {
            $table->foreignId('idCliente')->references('idCliente')->on('Clientes');
            $table->foreignId('idDatil')->references('idDatil')->on('Datiles');
            $table->bigInteger('cantidad');
            $table->primary(['idCliente', 'idDatil']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('ProductosCarrito');

    }
}
