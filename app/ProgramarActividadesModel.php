<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DataBase\ProgramarActividadesDAO;

define("ORGANICO", 1);
define("NO_ORGANICO", 2);

class ProgramarActividadesModel extends Model
{
    private $dataBase;

    public function __construct()
    {

        $this->dataBase = new ProgramarActividadesDAO();
    }

    public function getPredio($idPredio)
    {

        $predio = $this->dataBase->getPredio($idPredio);

        return $predio;
    }
    public function getActividades()
    {
        return $this->dataBase->getActividades();
    }
}
