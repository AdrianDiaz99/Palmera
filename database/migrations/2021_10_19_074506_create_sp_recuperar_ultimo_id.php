<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpRecuperarUltimoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("

        DROP PROCEDURE IF EXISTS sp_recuperar_ultimo_id;

        CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recuperar_ultimo_id`(IN i_user_id INT)
        inicio : BEGIN
        
            SET TRANSACTION ISOLATION LEVEL repeatable read;
            
            START TRANSACTION;
            
                IF NOT EXISTS (SELECT TRUE FROM users WHERE id = i_user_id) THEN
                    SELECT 
                        'error' as tipo,
                        'No existe usuario' as mensaje;
                    LEAVE inicio;
                END IF;
                    
                SELECT 
                    'message' as tipo,
                     MAX(id) as mensaje
                FROM predios
                WHERE user_id = i_user_id;
                
            COMMIT;
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
        DB::unprepared(' DROP PROCEDURE `sp_recuperar_ultimo_id`');
    }
}
