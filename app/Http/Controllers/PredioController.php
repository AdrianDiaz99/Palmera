<?php

namespace App\Http\Controllers;

use App\Predio;
use App\PredioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PredioController extends Controller
{

    private $predio;

    public function __construct()
    {

        $this->predio = new Predio();
    }

    public function iniciaRegistrarPredio()
    {

        $categorias = $this->predio->getCategorias();
        $tiposDeSuelo = $this->predio->getTiposDeSuelo();
        return view('predios.index', compact('categorias', 'tiposDeSuelo'));
    }

    public function consultar()
    {
        $predios = $this->modelo->getPrediosParaCrud();
        return view('predios.consultar')
            ->with('predios', $predios);
    }

    public function registrarPredio(Request $request)
    {

        if (isset($_POST['grabar'])) {

            $data = request()->validate([
                'FactorLluvia' => 'required|numeric',
                'FactorHumedad' => 'required|numeric',
                'FactorResequedad' => 'required|numeric',
                'Hectareas' => 'required|numeric',
                'TipoSuelo' => 'required',
                'Categoria' => 'required',
            ]);


            $predio = new Predio(
                array(
                    "PreID" => "",
                    "PreFactorLluvia" => $data['FactorLluvia'],
                    "PreFactorHumedad" => $data['FactorHumedad'],
                    "PreFactorResequedad" => $data['FactorResequedad'],
                    "PreHectareas" => $data['Hectareas'],
                    "PreTipoSuelo" => $data['TipoSuelo'],
                    "Categoria" => $data['Categoria'],
                    "EmpleadoAlta" => Auth::user()->Empleado->getId()
                )
            );

            $respuesta = json_decode($this->predio->agregarPredio($predio));

            if ($respuesta->tipo != 'error')
                return redirect()->action("PredioController@iniciaRegistrarPredio")
                    ->with($respuesta->tipo, $respuesta->mensaje);

            return redirect()->action("PredioController@iniciaRegistrarPredio")
                ->with($respuesta->tipo, $respuesta->mensaje)
                ->with('predio', $predio);
        }

        if (isset($_POST['recuperar'])) {

            $data = request()->validate([
                'IdPredio' => 'required|size:4'
            ]);

            $respuesta = $this->predio->getPredio($data['IdPredio']);

            if (!$respuesta instanceof Predio) {
                return redirect()->action("PredioController@index")->with('error', $respuesta);
            }

            $predio = $respuesta;
            $categorias = $this->predio->getCategorias();
            $tiposDeSuelo = $this->predio->getTiposDeSuelo();

            return view('predios.index', compact('predio', 'categorias', 'tiposDeSuelo'));
        }

        if (isset($_POST['actualizar'])) {

            $data = request()->validate([
                'IdPredio' => 'size:4',
                'FactorLluvia' => 'required|numeric',
                'FactorHumedad' => 'required|numeric',
                'FactorResequedad' => 'required|numeric',
                'Hectareas' => 'required|numeric',
                'TipoSuelo' => 'required',
                'Categoria' => 'required'
            ]);

            $respuesta = json_decode($this->predio->actualizarPredio($data));

            return redirect()->action("PredioController@index")->with($respuesta->tipo, $respuesta->mensaje);
        }

        if (isset($_POST['eliminar'])) {

            $data = request()->validate([
                'IdPredio' => 'size:4'
            ]);

            $respuesta = json_decode($this->predio->eliminarPredio($data['IdPredio']));

            return redirect()->action("PredioController@index")->with($respuesta->tipo, $respuesta->mensaje);
        }
    }
}
