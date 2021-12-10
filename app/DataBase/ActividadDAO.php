<?php

namespace App\DataBase;

use App\Actividad;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class ActividadDAO extends DataBase
{
    public function getActividades()
    {
        return Actividad::where('Estatus', 1)->get(['IdActividad', 'ActNombre', 'ActDescripcion', 'ActCosto']);
    }
}
