<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('TiposDeSuelo', function (Blueprint $table) {
            $table->id('SueloID');
            $table->text('SueloNombre');
        });

        Schema::create('Categorias', function (Blueprint $table) {
            $table->id('CatID');
            $table->string('CatNombre', 11);
        });

        Schema::create('predios', function (Blueprint $table) {
            $table->string('PreID', 4)->primary();
            $table->double('PreFactorLluvia', 8, 3);
            $table->double('PreFactorHumedad', 8, 3);
            $table->double('PreFactorResequedad', 8, 3);
            $table->double('PreHectareas');
            $table->foreignId('PreTipoSuelo')->references('SueloID')->on('TiposDeSuelo');
            $table->foreignId('Categoria')->references('CatID')->on('Categorias');
            $table->foreignId('EmpleadoAlta')->references('EmpID')->on('Empleados');
            $table->timestamps();
            $table->smallInteger('estatus')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predios');
        Schema::dropIfExists('Categorias');
        Schema::dropIfExists('TiposDeSuelo');
    }
}
