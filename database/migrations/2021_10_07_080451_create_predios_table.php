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

        Schema::create('CategoriasPredios', function (Blueprint $table) {
            $table->id();
            $table->string('CatNombre', 11);
        });

        Schema::create('predios', function (Blueprint $table) {
            $table->string('id', 4)->primary();
            $table->double('FactorLluvia', 8, 3);
            $table->double('FactorHumedad', 8, 3);
            $table->double('FactorResequedad', 8, 3);
            $table->double('Hectareas');
            $table->foreignId('categoria')->references('id')->on('categoriaspredios');
            $table->foreignId('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('CategoriasPredios');
    }
}
