<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->timestamp('FechaPedido')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('Cliente')->references('idCliente')->on('Clientes');
            $table->foreignId('Empleado')->nullable()->references('EmpID')->on('Empleados');
            $table->boolean('Entregado')->default(false);
            $table->timestamp('FechaEntregado')->nullable();
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
