<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpObtenerId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("

            DROP PROCEDURE IF EXISTS sp_obtener_id;

            CREATE PROCEDURE `sp_obtener_id` (IN i_tabla TEXT)
            BEGIN
                DECLARE v_idSiguiente TEXT;
                START TRANSACTION;
                
                SELECT IDSiguiente INTO v_idSiguiente FROM ControlConcurrencia WHERE tabla = i_tabla FOR UPDATE;
                
                UPDATE ControlConcurrencia 
                SET IDSiguiente = CONCAT(
                    SUBSTRING( IDSiguiente, 1, LENGTH(IDSiguiente) - 3 ),
                    LPAD( CONVERT(SUBSTRING(IDSiguiente, LENGTH(IDSiguiente) - 2), UNSIGNED ) + 1, 3, '0')
                )
                WHERE tabla = i_tabla;
                
                SELECT v_idSiguiente;
                
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared(' DROP PROCEDURE IF EXISTS sp_obtener_id;');
    }
}
