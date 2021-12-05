<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('Pedidos', function (Blueprint $table) {
            $table->id('idPedido');
            $table->foreignId('Cliente')->references('idCliente')->on('Clientes');
            $table->foreignId('Empleado')->references('EmpID')->on('Empleados');
            $table->boolean('Entregado');
            $table->timestamp('FechaPedido');
            $table->timestamp('FechaEntregado');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
        Schema::dropIfExists('Pedidos');

    }
}
