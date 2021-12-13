<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpInsertarActividadPredio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            DROP PROCEDURE IF EXISTS sp_insertar_actividad_predio;

            CREATE PROCEDURE `sp_insertar_actividad_predio`(
                IN i_PreID CHAR(6),
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
                DECLARE v_IdPalmera CHAR(6);
                DECLARE v_ActCosto DOUBLE(9,2);
                DECLARE v_Fecha DATE;
                DECLARE v_MaxFechaFin DATE;
                DECLARE v_ActNombre TEXT;
                DECLARE cursor1 CURSOR FOR SELECT IdPalmera FROM Palmeras WHERE Predio = i_PreID AND Estatus = 1;
                DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_IdPalmera = '0';
                    
                SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;
                START TRANSACTION;
                
                SELECT MAX(FechaProgramada) INTO v_MaxFechaFin FROM ActividadesXPalmera AP
                INNER JOIN Palmeras P ON AP.IdPalmera = P.IdPalmera
                WHERE P.Predio = i_PreID AND AP.IdActividad = i_IdActividad FOR UPDATE;
                
                SELECT ActNombre INTO v_ActNombre FROM Actividades WHERE IdActividad = i_IdActividad;
            
                IF ( i_FechaInicio < v_MaxFechaFin )THEN
                        
                    SET Estado = 0;
                    SET Respuesta = CONCAT('Ya se programo la actividad \"', v_ActNombre, '\" para las palmeras del predio hasta la fecha \"', v_MaxFechaFin, '\"');
                    ROLLBACK;
                    LEAVE proc;
                    
                END IF;
                    
                SELECT ActCosto INTO v_ActCosto FROM actividades WHERE IdActividad = i_IdActividad FOR UPDATE;
            
                SET v_Fecha = i_FechaInicio;
                    
                OPEN cursor1;
                bucle: LOOP
        
                    FETCH cursor1 INTO v_IdPalmera;
        
                
                    IF v_IdPalmera = '0' THEN
                    LEAVE bucle;
                    END IF;
                    
                
                    SELECT
                        CASE WHEN MAX(Consecutivo) IS NULL THEN 1 ELSE MAX(Consecutivo) + 1 END INTO v_ConsecutivoSig
                    FROM actividadesxpalmera WHERE IdActividad = i_IdActividad AND IdPalmera = v_IdPalmera AND Año = YEAR(i_FechaInicio)
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
                            v_IdPalmera, i_IdActividad, YEAR(i_FechaInicio), v_ConsecutivoSig, v_Fecha, i_Empleado, v_ActCosto
                        );
                    
                        SET v_ConsecutivoSig = v_ConsecutivoSig + 1;
                        SET v_Fecha = DATE_ADD(v_Fecha,INTERVAL i_Frecuencia DAY);
        
                    END WHILE;
                    
                    SET v_Fecha = i_FechaInicio;
                
                END LOOP bucle;
                CLOSE cursor1;
                        
                SET Estado = 1;
                SET Respuesta = CONCAT('Actividad \"', v_ActNombre, '\" programada con exito al predio \"', i_PreID, '\"');
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
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_insertar_actividad_predio;');
    }
}
