<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalmerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palmeras', function (Blueprint $table) {
            $table->string('IdPalmera', 6)->primary();
            $table->foreignId('Variedad')->references('VarID')->on('Variedades');
            $table->string('Predio');
            $table->foreignId('Categoria')->references('CatID')->on('Categorias');
            $table->foreignId('Empleado')->references('EmpID')->on('Empleados');
            $table->timestamps();
            $table->smallInteger('Estatus')->default('1');
            $table->foreign('Predio')->references('PreID')->on('Predios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('palmeras');
    }
}
