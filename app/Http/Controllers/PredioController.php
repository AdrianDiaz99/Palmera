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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $predios = $this->modelo->getPrediosParaCrud();
        return view('predios.index')->with('predios', $predios);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'FactorLluvia' => 'required|numeric',
            'FactorHumedad' => 'required|numeric',
            'FactorResequedad' => 'required|numeric',
            'Hectareas' => 'required|numeric'
        ]);

        $predio = new Predio($data['FactorLluvia'], $data['FactorHumedad'], $data['FactorResequedad'], $data['Hectareas'], Auth::user()->id);

        $respuesta = json_decode($this->modelo->agregarPredio($predio));

        return redirect()->action("PredioController@index")->with($respuesta->tipo, $respuesta->mensaje);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function show(PredioModel $predio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $predio = PredioModel::find($id);
        return view('predios.indexUpdatePredio', compact('predio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = request()->validate([
            'IdPredio' => 'size:0',
            'FactorLluvia' => 'required|numeric',
            'FactorHumedad' => 'required|numeric',
            'FactorResequedad' => 'required|numeric',
            'Hectareas' => 'required|numeric'
        ]);

        $predio = PredioModel::find($id);

        $predio->factorLluvia = $data['FactorLluvia'];
        $predio->factorHumedad = $data['FactorHumedad'];
        $predio->factorResequedad = $data['FactorResequedad'];
        $predio->hectareas = $data['Hectareas'];
        $predio->user_id = Auth::user()->id;

        $predio->save();

        return redirect()->action("PredioController@index")->with('message', 'Predio actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $predio = PredioModel::find($id);
        $predio->delete();
        return redirect()->action("PredioController@index")->with('message', 'Predio eliminado con éxito');
    }

    public function recuperar(Request $request)
    {

        $data = request();

        try
        {

            $predio = PredioModel::findOrFail($data['IdPredio']);
            return view('predios.indexRecuperarPredio', compact('predio'));

        }
        catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {

            return redirect()->action("PredioController@index")->with('error', 'El ID no existe');;

        }


    }

}
