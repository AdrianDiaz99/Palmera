<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TriggerPredioId extends Migration
{
    
    public function up()
    {

        DB::unprepared("
            CREATE TRIGGER tr_after_insert_predios BEFORE INSERT ON predios
            FOR EACH ROW
            BEGIN
            
                SELECT MAX(id) INTO @MaxId FROM predios;
                SET @MaxId = SUBSTRING(@MaxId, 2);
            
                IF @MaxId IS NULL THEN
                    SET NEW.id = 'P001';
                ELSE
                    SET @MaxId = CONVERT(@MaxId, UNSIGNED) + 1;
                    SET NEW.id = CONCAT('P', LPAD(@MaxId, 3, '0'));
                END IF;
                
            END
        ");

    }



    public function down()
    {

        DB::unprepared('DROP TRIGGER `tr_after_insert_predios` ');

    }

}
