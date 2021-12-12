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
            'CALL sp_insertar_actividad(?, ?, ?, ?, ?, ?, @Estado, @Respuesta)',
            [$idPalmera, $idActividad, $frecuencia, $fechaInicio, $fechaFin, Auth::user()->Empleado->getId()]
        );

        $respuesta = DB::select('SELECT @Respuesta AS Mensaje, @Estado AS Estado')[0];
        $tipo = $respuesta->Estado == 1 ? 'success' : 'error';

        return json_encode(
            array(
                "tipo" => $tipo,
                "message" => $respuesta->Mensaje
            )
        );
    }
}
