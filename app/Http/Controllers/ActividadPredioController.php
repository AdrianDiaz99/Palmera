<?php

namespace App\Http\Controllers;

use App\Predio;
use App\Actividad;
use App\Paginador;
use Illuminate\Http\Request;

class ActividadPredioController extends Controller
{
    private $predio;

    public function __construct()
    {
        $this->middleware('auth');
        $this->predio = new Predio();
    }

    public function iniciaProgramarActividades()
    {

        $tiposSuelo = $this->predio->getTiposDeSuelo();
        $predios = $this->predio->getPrediosOrganicos();

        return view('programar_actividades.predios.index', compact('tiposSuelo', 'predios'));
    }

    public function seleccionarPredio(Predio $predio)
    {

        $actividades = $this->predio->getActividades();
        return view('programar_actividades.predios.actividades', compact('predio', 'actividades'));
    }

    public function seleccionaActividad(Predio $predio, Actividad $actividad)
    {
        return view('programar_actividades.predios.actividad', compact('predio', 'actividad'));
    }

    public function agregarActividad(Request $request)
    {
        $data = request()->validate([
            'Frecuencia' => 'required|numeric',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date'
        ]);

        $predio = Predio::find($request['IdPredio']);

        $respuesta = json_decode(
            $this->predio->agregarActividadPredio(
                $predio,
                $request['IdActividad'],
                $request['Frecuencia'],
                $request['FechaInicio'],
                $request['FechaFin']
            )
        );

        return redirect()->route(
            'actividades_predios.seleccionarPredio',
            ['predio' => $predio->getPreID()]
        )->with($respuesta->tipo, $respuesta->message);
    }

    public function buscarPredio(Request $request)
    {
        $predios = $this->predio->getPrediosOrganicos($request['IdPredio'], $request['TipoSuelo']);
        $tiposSuelo = $this->predio->getTiposDeSuelo();

        return view('programar_actividades.predios.index', compact('predios', 'tiposSuelo'));
    }
}
