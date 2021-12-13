<?php

namespace App\DataBase;

use Exception;
use App\Predio;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PredioDAO extends DataBase
{

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

    public function eliminarPredio($id)
    {
        return DB::select("CALL sp_eliminar_predios('$id')")[0];
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

    public function getPredios()
    {
        $args = func_get_args();

        $categoria = $args[0];

        $predios = Predio::select(
            [
                'PreID',
                'PreFactorLluvia',
                'PreFactorHumedad',
                'PreFactorResequedad',
                'PreHectareas',
                'PreTipoSuelo',
                'Categoria',
                'EmpleadoAlta',
                'estatus'
            ]
        )->where('Categoria', $categoria);

        if (count(func_get_args()) == 3) {

            if ($args[1])
                $predios = $predios->where('PreID', $args[1]);

            if ($args[2])
                $predios = $predios->where('PreTipoSuelo', $args[2]);
        }

        return $predios->simplePaginate(10);
    }

    public function agregarActividadPredio(Predio $predio, $idActividad, $frecuencia, $fechaInicio, $fechaFin)
    {

        DB::statement(
            'CALL sp_insertar_actividad_predio(?, ?, ?, ?, ?, ?, @Estado, @Respuesta)',
            [$predio->getPreID(), $idActividad, $frecuencia, $fechaInicio, $fechaFin, Auth::user()->Empleado->getId()]
        );

        $respuesta = DB::select('SELECT @Respuesta AS Mensaje, @Estado AS Estado')[0];
        $tipo = $respuesta->Estado == 1 ? 'success' : 'error';

        return json_encode(
            array(
                "tipo" => $tipo,
                "message" => $respuesta->Mensaje
            )
        );
    }
}
