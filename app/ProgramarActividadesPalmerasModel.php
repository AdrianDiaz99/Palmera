<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DataBase\ProgramarActividadesPalmerasDAO;

define("ORGANICO", 1);
define("NO_ORGANICO", 2);

class ProgramarActividadesPalmerasModel extends Model
{
    private $dataBase;

    public function __construct()
    {

        $this->dataBase = new ProgramarActividadesPalmerasDAO();
    }

    public function getPredios()
    {
        $args = func_get_args();

        if (count(func_get_args()) > 0)
            $predio = $this->dataBase->getPredios($args[0], $args[1]);
        else
            $predio = $this->dataBase->getPredios();


        return $predio;
    }
    public function getPalmeras($predio)
    {
        return $this->dataBase->getPalmeras($predio);
    }

    public function getActividades()
    {
        return $this->dataBase->getActividades();
    }

    public function getTiposSuelo()
    {
        return $this->dataBase->getTiposSuelo();
    }
}
