<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesxpalmeraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividadesxpalmera', function (Blueprint $table) {
            $table->string('IdPalmera', 6);
            $table->foreign('IdPalmera')->references('IdPalmera')->on('Palmeras');
            $table->foreignId('IdActividad')->references('IdActividad')->on('Actividades');
            $table->string('Año', 4);
            $table->bigInteger('Consecutivo');
            $table->date('FechaProgramada');
            $table->foreignId('EmpleadoProgramo')->references('EmpID')->on('Empleados');
            $table->date('FechaRealizacion')->nullable();
            $table->foreignId('EmpleadoRealizo')->nullable();
            $table->double('Costo', 15, 2);
            $table->primary(['IdPalmera', 'IdActividad', 'Año', 'Consecutivo'], 'pk_actividadesxpalmera_idpalmera_idactividad_año_consecutivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividadesxpalmera');
    }
}
