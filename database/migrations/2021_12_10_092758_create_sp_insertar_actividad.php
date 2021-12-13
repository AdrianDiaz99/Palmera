<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpInsertarActividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("

            DROP PROCEDURE IF EXISTS sp_insertar_actividad;

            CREATE PROCEDURE sp_insertar_actividad(
                IN i_IdPalmera CHAR(6),
                IN i_IdActividad TEXT,
                IN i_Frecuencia SMALLINT,
                IN i_FechaInicio DATE,
                IN i_FechaFin DATE,
                IN i_Empleado INTEGER,
                OUT Estado SMALLINT,
                OUT Respuesta TEXT
            )
            proc: BEGIN
                DECLARE v_ConsecutivoSig TEXT;
                DECLARE v_ActCosto DOUBLE(9,2);
                DECLARE v_Fecha DATE;
                DECLARE v_MaxFechaFin DATE;
                DECLARE v_ActNombre TEXT;
            
                SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;
                START TRANSACTION;
                
                SELECT MAX(FechaProgramada) INTO v_MaxFechaFin FROM ActividadesXPalmera
                WHERE IdPalmera = i_IdPalmera AND IdActividad = i_IdActividad FOR UPDATE;

                SELECT ActNombre INTO v_ActNombre FROM Actividades WHERE IdActividad = i_IdActividad;
            
                IF ( i_FechaInicio < v_MaxFechaFin )THEN
                
                    SET Estado = 0;
                    SET Respuesta = CONCAT('Ya se programo la actividad \"', v_ActNombre, '\" para la palmera hasta la fecha \"', v_MaxFechaFin, '\"');
                    ROLLBACK;
                    LEAVE proc;
                    
                END IF;
            
                SELECT ActCosto INTO v_ActCosto FROM actividades WHERE IdActividad = i_IdActividad FOR UPDATE;
             
                SET v_Fecha = i_FechaInicio;
            
                SELECT
                    CASE WHEN MAX(Consecutivo) IS NULL THEN 1 ELSE MAX(Consecutivo) + 1 END INTO v_ConsecutivoSig
                FROM actividadesxpalmera WHERE IdActividad = i_IdActividad AND IdPalmera = i_IdPalmera AND Año = YEAR(i_FechaInicio)
                FOR UPDATE;
            
                WHILE v_Fecha <= i_FechaFin DO
            
                INSERT INTO actividadesxpalmera(
                    IdPalmera,
                    IdActividad,
                    Año,
                    Consecutivo,
                    FechaProgramada,
                    EmpleadoProgramo,
                    Costo
                ) VALUES(
                    i_IdPalmera, i_IdActividad, YEAR(i_FechaInicio), v_ConsecutivoSig, v_Fecha, i_Empleado, v_ActCosto
                );
            
                SET v_ConsecutivoSig = v_ConsecutivoSig + 1;
                SET v_Fecha = DATE_ADD(v_Fecha,INTERVAL i_Frecuencia DAY);
                
                END WHILE;
                SET Estado = 1;
                SET Respuesta = CONCAT('Actividad \"', v_ActNombre, '\" programada con exito');
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
        DB::unprepared(' DROP PROCEDURE IF EXISTS sp_insertar_actividad;');
    }
}
