<?php

namespace App;

use PDO;
use Illuminate\Support\Facades\DB;

class DataBase extends DB
{

    public function eliminarPredio($id)
    { 

        return DB::select("CALL sp_eliminar_predios('".$id."')");

    }

}


?>