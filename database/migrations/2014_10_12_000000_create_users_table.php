<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('Usuarios', function (Blueprint $table) {
            $table->string('Correo')->primary();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('TiposEmpleado', function (Blueprint $table) {
            $table->id('TipoID');
            $table->string('TipoNombre');
        });

        Schema::create('Empleados', function (Blueprint $table) {
            $table->id('EmpID');
            $table->string('EmpCorreo');
            $table->foreign('EmpCorreo')->references('Correo')->on('Usuarios');
            $table->string('EmpDomicilio');
            $table->string('EmpNombre');
            $table->char('EmpTelefono', 10);
            $table->foreignId('TipoEmpleado')->references('TipoID')->on('TiposEmpleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Empleados');
        Schema::dropIfExists('TiposEmpleado');
        Schema::dropIfExists('Usuarios');
    }
}
