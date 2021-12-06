<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramarActividadesModel extends Model
{
    private $dataBase;

    public function __construct()
    {

        $this->dataBase = new DataBase();
    }

    public function getPredio($idPredio)
    {

        return $this->dataBase->getPredio($idPredio);
    }
}
