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
            BEGIN
            
                SET TRANSACTION ISOLATION LEVEL repeatable read;
            
                START TRANSACTION;
                
                    UPDATE predios
                    SET factorLluvia = factorLluvia * 2
                    WHERE id = idPredio;
            
                    SELECT SLEEP(10);
            
                COMMIT;
            END
        ");

    }



    public function down()
    {

        DB::unprepared('DROP PROCEDURE `sp_eliminar_predios` ');

    }

}
