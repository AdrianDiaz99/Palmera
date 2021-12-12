<?php

namespace App\DataBase;

use App\Predio;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class PredioDAO extends DB
{


    public function getPredios()
    {
        $args = func_get_args();

        $categoria = $args[0];

        $predios = Predio::select(
            [
                'PreID',
                'PreFactorLluvia',
                'PreFactorHumedad',
                'PreFactorResequedad',
                'PreHectareas',
                'PreTipoSuelo',
                'Categoria',
                'EmpleadoAlta',
                'estatus'
            ]
        )->where('Categoria', $categoria);

        if (count(func_get_args()) == 3) {

            if ($args[1])
                $predios = $predios->where('PreID', $args[1]);

            if ($args[2])
                $predios = $predios->where('PreTipoSuelo', $args[2]);
        }

        return $predios->simplePaginate(10);
    }

    public function agregarActividadPredio(Predio $predio, $idActividad, $frecuencia, $fechaInicio, $fechaFin)
    {

        DB::statement(
            'CALL sp_insertar_actividad_predio(?, ?, ?, ?, ?, ?, @Estado, @Respuesta)',
            [$predio->getPreID(), $idActividad, $frecuencia, $fechaInicio, $fechaFin, Auth::user()->Empleado->getId()]
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
