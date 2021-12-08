<?php

namespace App\Http\Controllers;

use App\Predio;
use App\Palmera;
use Illuminate\Http\Request;
use App\ProgramarActividadesPalmerasModel;

class ProgramarActividadesPalmerasController extends Controller
{
    public $modelo;

    public function __construct()
    {
        $this->middleware('auth');
        $this->modelo = new ProgramarActividadesPalmerasModel();
    }

    public function iniciaProgramarActividades()
    {
        $tiposSuelo = $this->modelo->getTiposSuelo();
        $predios = $this->modelo->getPredios();
        return view('programar_actividades.palmeras.index', compact('tiposSuelo', 'predios'));
    }

    public function showPalmerasPredio(Predio $predio)
    {
        $palmeras = $this->modelo->getPalmeras($predio);
        return view('programar_actividades.palmeras.palmeras_predio', compact('predio', 'palmeras'));
    }

    public function buscarPredio(Request $request)
    {

        $predios = $this->modelo->getPredios($request['IdPredio'], $request['TipoSuelo']);
        $tiposSuelo = $this->modelo->getTiposSuelo();

        return view('programar_actividades.palmeras.index', compact('predios', 'tiposSuelo'));
    }
}
