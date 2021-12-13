<?php

namespace App\Http\Controllers;

use App\Predio;
use App\Palmera;
use App\Actividad;
use App\Paginador;
use App\TipoDeSuelo;
use App\ActividadesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActividadPalmeraController extends Controller
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
        $predios = $this->predio->getPrediosNoOrganicos();

        return view('programar_actividades.palmeras.index', compact('tiposSuelo', 'predios'));
    }

    public function seleccionarPredio(Predio $predio)
    {

        $palmeras = Paginador::paginate($predio->getPalmeras, 2);
        return view('programar_actividades.palmeras.palmeras_predio', compact('predio', 'palmeras'));
    }

    public function seleccionaPalmera(Predio $predio, Palmera $palmera)
    {
        $actividades = $this->predio->getActividades($palmera);
        return view('programar_actividades.palmeras.actividades', compact('predio', 'palmera', 'actividades'));
    }

    public function seleccionaActividad(Predio $predio, Palmera $palmera, Actividad $actividad)
    {
        return view('programar_actividades.palmeras.actividad', compact('predio', 'palmera', 'actividad'));
    }

    public function agregarActividad(Request $request)
    {
        $data = request()->validate([
            'Frecuencia' => 'required|numeric',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date'
        ]);

        $respuesta = json_decode(
            $this->predio->agregarActividadPalmera(
                $request['IdPalmera'],
                $request['IdActividad'],
                $request['Frecuencia'],
                $request['FechaInicio'],
                $request['FechaFin']
            )
        );

        return redirect()->route(
            'actividades_palmeras.seleccionaPalmera',
            [
                "predio" => $request['IdPredio'],
                "palmera" => $request['IdPalmera']
            ]
        )->with($respuesta->tipo, $respuesta->message);
    }

    public function buscarPredio(Request $request)
    {
        $predios = $this->predio->getPrediosNoOrganicos($request['IdPredio'], $request['TipoSuelo']);
        $tiposSuelo = $this->predio->getTiposDeSuelo();

        return view('programar_actividades.palmeras.index', compact('predios', 'tiposSuelo'));
    }
}
