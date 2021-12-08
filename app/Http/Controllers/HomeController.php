<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function eventos($opcion)
    {
        $ruta  = "";

        switch ($opcion) {
            case "Predios":
                $ruta = "predios.index";
                break;
            case "ProgramarActividades":
                $ruta = "programar_actividades_palmeras.index";
                break;
        }

        return redirect()->route($ruta);
    }
}
