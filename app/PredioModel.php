<?php

namespace App;

use App\DataBase\DataBase;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

/*******************************************************

ESTA CLASE SE MIGRARÁ A SU RESPECTIVA CLASE DE DOMINIO QUE A SU VEZ SERÁ EL MODELO

*******************************************************/

class PredioModel extends Model
{

    private $dataBase;

    public function __construct()
    {

        $this->dataBase = new DataBase();
    }

    public function getCategorias()
    {
        return $this->dataBase->getCategorias();
    }

    public function getTiposSuelo()
    {
        return $this->dataBase->getTiposSuelo();
    }

    public function getPrediosParaCrud()
    {
        return $this->dataBase->getPredios();
    }

    public function getPredio($id)
    {
        return $this->dataBase->getPredio($id);
    }

    public function agregarPredio(Predio $predio)
    {
        return $this->dataBase->agregarPredio($predio);
    }

    public function actualizarPredio($data)
    {
        $predio = Predio::findOrFail($data['IdPredio']);

        if ($predio->getEstatus() == 0) {

            return json_encode(
                $respuesta = array(
                    "tipo" => "error",
                    "mensaje" => "El predio se encuentra dado de baja"
                )
            );
        }

        $predio->setFactorLluvia($data['FactorLluvia']);
        $predio->setFactorHumedad($data['FactorHumedad']);
        $predio->setFactorResequedad($data['FactorResequedad']);
        $predio->setHectareas($data['Hectareas']);
        $predio->setTipoSuelo($data['TipoSuelo']);
        $predio->setCategoria($data['Categoria']);

        return $this->dataBase->actualizarPredio($predio);
    }

    public function eliminarPredio($id)
    {

        $respuesta = $this->dataBase->eliminarPredio($id);

        return json_encode($respuesta);
    }
}
