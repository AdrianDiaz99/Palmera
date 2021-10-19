<?php

namespace App;

use App\DataBase;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PredioModel extends Model
{

    private $dataBase;

    public function __construct()
    {

        $this->dataBase = new DataBase();
    }

    public function getCategoriasPredios()
    {
        return CategoriaPredio::all();
    }

    public function getPrediosParaCrud()
    {
        return Predio::all(['id', 'FactorLluvia', 'FactorHumedad', 'FactorResequedad', 'Hectareas', 'categoria']);
    }

    public function getPredio($id)
    {
        try {

            $predio = Predio::findOrFail($id);

            return $predio;
        } catch (Exception $e) {
            return "No se encontró el predio";
        }
    }

    public function agregarPredio(Predio $predio)
    {

        try {

            $predio->save();

            $respuesta = array(
                "tipo" => "message",
                "mensaje" => "Predio insertado correctamente"
            );
        } catch (Exception $e) {

            $respuesta = array(
                "tipo" => "error",
                "mensaje" => "Error al insertar predio \n\nDetalle del error: {$e->getMessage()}"
            );
        }

        return json_encode($respuesta);
    }

    public function actualizarPredio($data)
    {

        try {

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
            $predio->setCategoria($data['Categoria']);
            $predio->setUserAlta($data['user_id']);

            $predio->save();

            $respuesta = array(
                "tipo" => "message",
                "mensaje" => "Predio guardado correctamente"
            );
        } catch (ModelNotFoundException  $e) {
            $respuesta = array(
                "tipo" => "error",
                "mensaje" => "No existe predio"
            );
        } catch (Exception $e) {
            $respuesta = array(
                "tipo" => "error",
                "mensaje" => "No se pudo actualizar el predio en la base de datos. \n\nDetalle del error: {$e->getMessage()}"
            );
        }

        return json_encode($respuesta);
    }

    public function eliminarPredio($id)
    {

        $respuesta = $this->dataBase->eliminarPredio($id);

        return $respuesta;
    }
}
