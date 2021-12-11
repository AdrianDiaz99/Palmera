<?php

namespace App\DataBase;

use App\TipoDeSuelo;
use Illuminate\Support\Facades\DB;

class TipoDeSueloDAO extends DB
{

    public function getTiposSuelo()
    {

        return TipoDeSuelo::all();

    }

}