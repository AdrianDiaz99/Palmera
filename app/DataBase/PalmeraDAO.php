<?php

namespace App\DataBase;

use App\Actividad;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PalmeraDAO extends DataBase
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
