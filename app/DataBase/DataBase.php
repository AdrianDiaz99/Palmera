<?php

namespace App\DataBase;

use App\Predio;
use App\Categoria;
use App\TipoDeSuelo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use PHPUnit\Framework\MockObject\Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;


/*******************************************************

ESTA CLASE SE MIGRARÁ A LOS DAO

 *******************************************************/
class DataBase extends DB
{

    public function eliminarPredio($id)
    {
        return DB::select("CALL sp_eliminar_predios('$id')")[0];
    }

    public function agregarPredio($predio)
    {

        try {

            $idPredio = $this->obtenerUltimoId("Predios");
            $predio->setPreID($idPredio);
            $predio->saveOrFail();

            $respuesta = array(
                "tipo" => "message",
                "mensaje" => "Predio insertado correctamente con el ID \"$idPredio\""
            );
        } catch (Exception $e) {

            $respuesta = array(
                "tipo" => "error",
                "mensaje" => "Error al insertar predio \n\nDetalle del error: {$e->getMessage()}"
            );
        }

        return json_encode($respuesta);
    }

    public function actualizarPredio($predio)
    {
        try {

            $predio->saveOrFail();

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

    public function obtenerUltimoId($nombreTabla)
    {

        return DB::select("CALL sp_obtener_id('$nombreTabla')")[0]->v_idSiguiente;
    }

    public function getPredio($id)
    {
        try {

            $predio = Predio::findOrFail($id);

            if ($predio->getEstatus() == 0) {
                return "El predio se encuentra dado de baja";
            }

            return $predio;
        } catch (Exception $e) {
            return "No se encontró el predio";
        }
    }

    public function getTiposSuelo()
    {
        return TipoDeSuelo::all();
    }

    public function getCategorias()
    {
        return Categoria::all();
    }
}
