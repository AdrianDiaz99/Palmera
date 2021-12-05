<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('Datiles', function (Blueprint $table) {
            $table->id('idDatil');
            $table->foreignId('Categoria')->references('CatID')->on('Categorias');
            $table->foreignId('Variedad')->references('VarID')->on('Variedades');
            $table->double('Precio');
            $table->double('Stock');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
        Schema::dropIfExists('Datiles');

    }
}
