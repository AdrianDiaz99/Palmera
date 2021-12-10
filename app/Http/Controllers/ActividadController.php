<?php

namespace App\Http\Controllers;

use App\Predio;
use App\Palmera;
use App\Actividad;
use App\TiposDeSuelo;
use App\ActividadesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActividadController extends Controller
{
    public $predio;
    public $tipoSuelo;
    public $palmera;
    public $categoria;
    public $actividad;

    public function __construct()
    {
        $this->middleware('auth');

        $this->predio = new Predio();
        $this->tipoSuelo = $this->predio->crearTipoSuelo();
        $this->palmera = $this->predio->crearPalmera();
        $this->categoria = $this->predio->crearCategoria();
        $this->actividad = $this->palmera->crearActividad();

        //$this->modelo = new ActividadesModel();
    }

    public function iniciaProgramarActividades()
    {

        $tiposSuelo = $this->tipoSuelo->getTiposSuelo();
        $predios = $this->predio->getPredios();

        return view('programar_actividades.palmeras.index', compact('tiposSuelo', 'predios'));
    }

    public function seleccionarPredio(Predio $predio)
    {
        $palmeras = $this->predio->getPagination($predio->getPalmeras);


        return view('programar_actividades.palmeras.palmeras_predio', compact('predio', 'palmeras'));
    }

    public function seleccionaPalmera(Palmera $palmera)
    {
        return view('programar_actividades.palmeras.palmera', compact('palmera'));
    }

    public function actividades(Palmera $palmera)
    {
        $this->palmera = $palmera;
        $actividades = $this->actividad->getActividades();
        return view('programar_actividades.palmeras.actividades', compact('palmera', 'actividades'));
    }

    public function mostrarActividad(Palmera $palmera, Actividad $actividad)
    {
        return view('programar_actividades.palmeras.actividad', compact('palmera', 'actividad'));
    }

    public function programarActividad(Request $request)
    {
        $data = request()->validate([
            'Frecuencia' => 'required|numeric',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date'
        ]);

        $this->palmera->programarActividad(
            $request['IdPalmera'],
            $request['IdActividad'],
            $request['Frecuencia'],
            $request['FechaInicio'],
            $request['FechaFin']
        );

        $actividades = $this->actividad->getActividades();
        $palmera = Palmera::find($request['IdPalmera']);

        return view('programar_actividades.palmeras.actividades', compact('palmera', 'actividades'));
    }

    public function buscarPredio(Request $request)
    {

        $predios = $this->modelo->getPredios($request['IdPredio'], $request['TipoSuelo']);
        $tiposSuelo = $this->modelo->getTiposSuelo();

        return view('programar_actividades.palmeras.index', compact('predios', 'tiposSuelo'));
    }
}
