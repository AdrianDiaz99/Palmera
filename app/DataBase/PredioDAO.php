<?php

namespace App\DataBase;

use App\Predio;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class PredioDAO extends DB
{


    public function getPredios()
    {
        $args = func_get_args();
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
        );

        if (count(func_get_args()) > 0) {

            if ($args[0])
                $predios = $predios->where('PreID', $args[0]);

            if ($args[1])
                $predios = $predios->where('PreTipoSuelo', $args[1]);
        }

        return $predios->simplePaginate(10);
    }
}
