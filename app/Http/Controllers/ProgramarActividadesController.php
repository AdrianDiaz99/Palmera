<?php

namespace App\Http\Controllers;

use App\ProgramarActividadesModel;

use Illuminate\Http\Request;

class ProgramarActividadesController extends Controller
{
    public $modelo;

    public function __construct()
    {
        $this->middleware('auth');
        $this->modelo = new ProgramarActividadesModel();
    }

    public function index()
    {

        return view('programar_actividades.index');
    }

    public function events(Request $request)
    {
        if (isset($_POST['buscar'])) {
            $request->validate([
                'IdPredio' => 'required|size:4'
            ]);

            $predio = $this->modelo->getPredio($request['IdPredio']);

            return view('programar_actividades.index', compact('predio'));
        }

        if (isset($_POST['programar_nueva_actividad'])) {
        }
    }
}
