<?php

namespace App\DataBase;

use App\Predio;
use App\Categoria;
use App\TipoDeSuelo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use PHPUnit\Framework\MockObject\Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;


/*******************************************************

ESTA CLASE SE MIGRARÁ A LOS DAO

 *******************************************************/
class DataBase extends DB
{

    public function obtenerUltimoId($nombreTabla)
    {
        return DB::select("CALL sp_obtener_id('$nombreTabla')")[0]->v_idSiguiente;
    }
}
