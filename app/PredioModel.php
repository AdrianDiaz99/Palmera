<?php

namespace App;

use App\DataBase;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PredioModel extends Model
{
    protected $table = 'predios';
    protected $fillable = ['factorLluvia', 'factorHumedad', 'factorResequedad', 'hectareas', 'categoria', 'user_id'];
    protected $keyType = 'string';
    public $incrementing = false;

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
        
        $predios = PredioModel::where('estatus', '=', 1)->lockForUpdate()->paginate(10);

        return $predios;
    }

    public function getPredio($id)
    {
        try {

            $predio = PredioModel::select('FactorLluvia', 'FactorHumedad', 'FactorResequedad', 'Hectareas', 'user_id', 'Categoria', 'estatus')->where('id', $id)->lockForUpdate()->firstOrFail();
            
            if($predio->estatus == 0)
            {

                return "Predio inactivo";

            }

            $predio = new Predio($predio->FactorLluvia, $predio->FactorHumedad, $predio->FactorResequedad, $predio->Hectareas, $predio->user_id, $predio->Categoria);
            $predio->setId($id);

            return $predio;

        } catch (Exception $e) {
            return "No se encontró el predio";
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
            $oldPredio->Categoria        = $predio->getCategoria();

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

        $respuesta = $this->dataBase->eliminarPredio($id);

        return $respuesta;

    }

    public function obtenerCategoria()
    {
        return $this->belongsTo(CategoriaPredio::class, 'categoria');
    }
}
