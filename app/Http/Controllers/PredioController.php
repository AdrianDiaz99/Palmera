<?php

namespace App\Http\Controllers;

use App\Predio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PredioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('predios.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'IdPredio' => 'size:0',
            'FactorLluvia' => 'required|numeric',
            'FactorHumedad' => 'required|numeric',
            'FactorResequedad' => 'required|numeric',
            'Hectareas' => 'required|numeric'
        ]);

        DB::table("predios")->insert([
            'FactorLluvia' => $data['FactorLluvia'],
            'FactorHumedad' => $data['FactorHumedad'],
            'FactorResequedad' => $data['FactorResequedad'],
            'Hectareas' => $data['Hectareas'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->action("PredioController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function show(Predio $predio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function edit(Predio $predio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Predio $predio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Predio $predio)
    {
        //
    }
}
