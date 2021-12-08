<?php

namespace App\DataBase;

use App\Actividad;


class ProgramarActividadesDAO extends DataBase
{
    public function getActividades()
    {
        return Actividad::where('Estatus', 1)->get(['IdActividad', 'ActNombre', 'ActDescripcion', 'ActCosto']);
    }
}
