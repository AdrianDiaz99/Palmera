<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpEliminarPredio extends Migration
{
    
    public function up()
    {

        DB::unprepared("
        CREATE PROCEDURE sp_eliminar_predios(IN idPredio VARCHAR(4))
        inicio : BEGIN

            SET TRANSACTION ISOLATION LEVEL repeatable read;

            START TRANSACTION;
            
                IF NOT EXISTS (SELECT TRUE FROM predios WHERE id = idPredio) THEN
                    SELECT 
                        'error' as tipo,
                        'El predio no existe' as mensaje;
                    LEAVE inicio;
                END IF;
                
                IF EXISTS (SELECT TRUE FROM predios WHERE id = idPredio AND estatus = 0) THEN
                    SELECT 
                        'error' as tipo,
                        'El predio ya fue dado de baja con anterioridad' as mensaje;
                    LEAVE inicio;
                END IF;
            
                UPDATE predios
                SET Estatus = 0
                WHERE id = idPredio;
                    
            SELECT 
                'message' as tipo,
                'Predio eliminado correctamente' as mensaje;
                
            COMMIT;
        END
        ");

    }



    public function down()
    {

        DB::unprepared('DROP PROCEDURE `sp_eliminar_predios` ');

    }

}