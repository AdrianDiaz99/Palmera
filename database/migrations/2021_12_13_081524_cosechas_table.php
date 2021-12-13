<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CosechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cosechas', function (Blueprint $table) {
            $table->string('idPalmera');
            $table->foreign('idPalmera')->references('IdPalmera')->on('palmeras');
            $table->string('Año', 4);
            $table->id('Consecutivo');
            $table->timestamp('Fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->double('Kilos');
            $table->double('CostoCosecha');
            $table->foreignId('Categoria')->references('CatID')->on('Categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('Cosechas');

    }
}
