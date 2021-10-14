<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class PredioModel extends Model
{
    protected $table = 'predios';
    protected $fillable = ['factorLluvia', 'factorHumedad', 'factorResequedad', 'hectareas', 'user_id'];
    protected $keyType = 'string';
    public $incrementing = false;

    public function getPrediosParaCrud()
    {
        return parent::get(['id', 'FactorLluvia', 'FactorHumedad', 'FactorResequedad', 'Hectareas']);
    }

    public function agregarPredio(Predio $predio)
    {

        $this->factorLluvia     = $predio->getFactorLluvia();
        $this->factorHumedad    = $predio->getFactorHumedad();
        $this->factorResequedad = $predio->getFactorResequedad();
        $this->hectareas        = $predio->getHectareas();
        $this->user_id          = $predio->getUserAlta();

        try {

            parent::saveOrFail();

            return json_encode(
                array(
                    "tipo" => "message",
                    "mensaje" => "Predio insertado correctamente"
                )
            );
        } catch (Exception $e) {

            return json_encode(
                array(
                    "tipo" => "error",
                    "mensaje" => "Error al insertar predio"
                )
            );
        }
    }
}
