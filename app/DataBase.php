<?php

namespace App;

use PDO;
use Illuminate\Support\Facades\DB;

class DataBase extends DB
{

    public function eliminarPredio($id)
    {

        return DB::select("CALL sp_eliminar_predios('$id')")[0];
    }

    public function obtenerUltimoId($id)
    {

        return DB::select("CALL sp_recuperar_ultimo_id('$id')")[0];
    }
}
