<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PredioModel extends Model
{
    protected $table = 'predios';
    protected $fillable = ['factorLluvia', 'factorHumedad', 'factorResequedad', 'hectareas', 'categoria', 'user_id'];
    protected $keyType = 'string';
    public $incrementing = false;

    public function getCategoriasPredios()
    {
        return CategoriaPredio::all();
    }

    public function getPrediosParaCrud()
    {
        return PredioModel::all(['id', 'FactorLluvia', 'FactorHumedad', 'FactorResequedad', 'Hectareas', 'categoria']);
    }

    public function getPredio($id)
    {
        try {

            $predio = PredioModel::select('FactorLluvia', 'FactorHumedad', 'FactorResequedad', 'Hectareas', 'user_id', 'Categoria')->where('id', $id)->firstOrFail();
            $predio = new Predio($predio->FactorLluvia, $predio->FactorHumedad, $predio->FactorResequedad, $predio->Hectareas, $predio->user_id, $predio->Categoria);
            $predio->setId($id);

            return $predio;
        } catch (Exception $e) {
            return "No se encontro el predio";
        }
    }

    public function agregarPredio(Predio $predio)
    {

        $this->factorLluvia     = $predio->getFactorLluvia();
        $this->factorHumedad    = $predio->getFactorHumedad();
        $this->factorResequedad = $predio->getFactorResequedad();
        $this->hectareas        = $predio->getHectareas();
        $this->Categoria        = $predio->getCategoria();
        $this->user_id          = $predio->getUserAlta();

        try {

            $this->save();

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

    public function actualizarPredio($id, $predio)
    {

        try {

            $oldPredio = PredioModel::findOrFail($id);

            $oldPredio->factorLluvia     = $predio->getFactorLluvia();
            $oldPredio->factorHumedad    = $predio->getFactorHumedad();
            $oldPredio->factorResequedad = $predio->getFactorResequedad();
            $oldPredio->hectareas        = $predio->getHectareas();
            $oldPredio->user_id          = $predio->getUserAlta();
            $oldPredio->Categoria         = $predio->getCategoria();

            $oldPredio->save();

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

        try {

            $predio = PredioModel::findOrFail($id);
            $predio->delete();

            $respuesta = array(
                "tipo" => "message",
                "mensaje" => "Predio eliminado correctamente"
            );
        } catch (ModelNotFoundException  $e) {
            $respuesta = array(
                "tipo" => "error",
                "mensaje" => "No existe predio"
            );
        } catch (Exception $e) {
            $respuesta = array(
                "tipo" => "error",
                "mensaje" => "No se pudo eliminar el predio en la base de datos. \n\nDetalle del error: {$e->getMessage()}"
            );
        }

        return json_encode($respuesta);
    }

    public function obtenerCategoria()
    {
        return $this->belongsTo(CategoriaPredio::class, 'categoria');
    }
}
