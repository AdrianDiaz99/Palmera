<?php

namespace App\DataBase;

use App\Actividad;
use Illuminate\Support\Facades\DB;

class ActividadDAO extends DB
{

    public function getActividades()
    {

        return Actividad::where('Estatus', 1)->get(['IdActividad', 'ActNombre', 'ActDescripcion', 'ActCosto']);
        
    }

}