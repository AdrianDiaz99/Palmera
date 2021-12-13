<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidosdetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pedidosdetalle', function (Blueprint $table) {
            $table->foreignId('idPedido')->references('idPedido')->on('Pedidos');
            $table->foreignId('idDatil')->references('idDatil')->on('Datiles');
            $table->double('KilosPedidos');
            $table->double('Precio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pedidosdetalle');
    }
}
