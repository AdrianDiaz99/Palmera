<?php

namespace App\DataBase;

use App\Palmera;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PalmeraDAO extends DB
{

    public function programarActividad($idPalmera, $idActividad, $frecuencia, $fechaInicio, $fechaFin)
    {

        DB::statement(
            'CALL sp_insertar_actividad(?, ?, ?, ?, ?, ?)',
            [$idPalmera, $idActividad, $frecuencia, $fechaInicio, $fechaFin, Auth::user()->Empleado->getId()]
        );

        //return DB::unprepared("CALL sp_insertar_actividad('$idPalmera', $idActividad, $frecuencia, '$fechaInicio', '$fechaFin', " . Auth::user()->Empleado->getId()) . ");";
    }

}