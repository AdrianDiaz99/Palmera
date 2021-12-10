@extends('layouts.app')


@section('content')

    <h1 class="text-center mb-5">Predios</h1>

    <div class="col-md-8 mx-auto bg-white p-3">

        @if (\Session::has('error'))

            <div class="alert alert-danger">
                <p>{{ \Session::get('error') }}</p>
            </div>

        @endif

        @if (\Session::has('message'))

            <div class="alert alert-success">
                <p>{{ \Session::get('message') }}</p>
            </div>

        @endif

        <form method="GET" action="{{ route('actividades_palmeras.actividades', ['palmera' => $palmera->getId()]) }}">
            @csrf

            <div class="form-group">
                <label for="IdPredio">ID Palmera</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="IdPredio"
                    name="IdPredio"
                    value="{{ $palmera->getId() }}"
                    readonly
                >

            </div>

            <div class="form-group">
                <label for="IdPredio">Variedad</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="IdPredio"
                    name="IdPredio"
                    value="{{ $palmera->objetoVariedad->getVarNombre() }}"
                    readonly
                >

            </div>

            <div class="form-group">
                <label for="IdPredio">Variedad</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="IdPredio"
                    name="IdPredio"
                    value="{{ $palmera->objetoCategoria->getCatNombre() }}"
                    readonly
                >

            </div>

            <div class="form-group">
                <label for="IdPredio">Empleado</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="IdPredio"
                    name="IdPredio"
                    value="{{ $palmera->objetoEmpleado->getNombre() }}"
                    readonly
                >

            </div>

            <button 
                type="submit" 
                class="btn btn-dark mb-1 mt-1" 
                name="programar_actividades"
                
            >
                Programar Actividades
            </button>

        </form>

    </div>


@endsection
