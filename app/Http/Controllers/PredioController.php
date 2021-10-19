<?php

namespace App\Http\Controllers;

use App\Predio;
use App\PredioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PredioController extends Controller
{
    public $modelo;

    public function __construct()
    {
        $this->middleware('auth');
        $this->modelo = new PredioModel();
    }

    public function index()
    {

        $categorias = $this->modelo->getCategoriasPredios();
        return view('predios.index')
            ->with('categorias', $categorias);
    }

    public function consultar()
    {
        $predios = $this->modelo->getPrediosParaCrud();
        return view('predios.consultar')
            ->with('predios', $predios);
    }

    public function postEvents(Request $request)
    {

        if (isset($_POST['grabar'])) {

            $data = request()->validate([
                'FactorLluvia' => 'required|numeric',
                'FactorHumedad' => 'required|numeric',
                'FactorResequedad' => 'required|numeric',
                'Hectareas' => 'required|numeric',
                'Categoria' => 'required',
            ]);

            $predio = new Predio();
            $predio->asignarVariables(
                $data['FactorLluvia'],
                $data['FactorHumedad'],
                $data['FactorResequedad'],
                $data['Hectareas'],
                $data['Categoria'],
                Auth::user()->id
            );
            $respuesta = json_decode($this->modelo->agregarPredio($predio));

            return redirect()->action("PredioController@index")->with($respuesta->tipo, $respuesta->mensaje);
        }

        if (isset($_POST['recuperar'])) {

            $data = request()->validate([
                'IdPredio' => 'required|size:4'
            ]);

            $respuesta = $this->modelo->getPredio($data['IdPredio']);
            $categorias = $this->modelo->getCategoriasPredios();

            if (!$respuesta instanceof Predio) {
                return redirect()->action("PredioController@index")->with('error', $respuesta);
            }

            $predio = $respuesta;

            return view('predios.index', compact('predio', 'categorias'));
        }

        if (isset($_POST['actualizar'])) {

            $data = request()->validate([
                'IdPredio' => 'size:4',
                'FactorLluvia' => 'required|numeric',
                'FactorHumedad' => 'required|numeric',
                'FactorResequedad' => 'required|numeric',
                'Hectareas' => 'required|numeric',
                'Categoria' => 'required'
            ]);

            $data['user_id'] = Auth::user()->id;

            $respuesta = json_decode($this->modelo->actualizarPredio($data));

            return redirect()->action("PredioController@index")->with($respuesta->tipo, $respuesta->mensaje);
        }

        if (isset($_POST['eliminar'])) {

            $data = request()->validate([
                'IdPredio' => 'size:4'
            ]);

            $respuesta = json_decode($this->modelo->eliminarPredio($data['IdPredio']));

            return redirect()->action("PredioController@index")->with($respuesta->tipo, $respuesta->mensaje);
        }
    }
}
