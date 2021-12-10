<?php

namespace App;

use App\DataBase\ActividadesDAO;
use Illuminate\Database\Eloquent\Model;

define("ORGANICO", 1);
define("NO_ORGANICO", 2);

class ActividadesModel extends Model
{
    private $dataBase;

    public function __construct()
    {

        $this->dataBase = new ActividadesDAO();
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
}
