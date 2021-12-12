@extends('layouts.app')

@section('active_reference')
    {{ Breadcrumbs::render('actividades_predios.agregar_actividad', $predio, $actividad) }}
@endsection

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

        <form method="POST" action="{{ route('actividades_predios.programar_actividad') }}">
            @csrf

            <input 
                type="hidden" 
                class="form-control" 
                id="IdPredio"
                name="IdPredio"
                value="{{ $predio->getPreID() }}"
                readonly
            >
            
            <div class="form-group">
                <label for="IdActividad">ID Actividad</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="IdActividad"
                    name="IdActividad"
                    value="{{ $actividad->getId() }}"
                    readonly
                >

            </div>

            <div class="form-group">
                <label for="ActividadNombre">Nombre</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="ActividadNombre"
                    name="ActividadNombre"
                    value="{{ $actividad->getNombre() }}"
                    readonly
                >

            </div>

            <div class="form-group">
                <label for="ActividadDescripcion">Descripcion</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="ActividadDescripcion"
                    name="ActividadDescripcion"
                    value="{{ $actividad->getDescripcion() }}"
                    readonly
                >

            </div>

            <div class="form-group">
                <label for="ActividadCosto">Costo</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="ActividadCosto"
                    name="ActividadCosto"
                    value="{{ $actividad->getCosto() }}"
                    readonly
                >

            </div>
            <div class="form-group">

                <label for="Frecuencia">Frecuencia</label>
                <input 
                    type="text" 
                    class="form-control @error('Frecuencia') is-invalid @enderror" 
                    id="Frecuencia"
                    name="Frecuencia"
                    value="{{$actividad->getFrecuencia()}}"
                    title="Capturar cada cuantos dias se realizara esta actividad"
                >
                
                @error('Frecuencia')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            
            <div class="row">

                <div class="form-group col-md-6">
                    
                    <label for="FechaInicio">Fecha Inicio</label>
                    <input 
                        type="date" 
                        class="form-control @error('FechaInicio') is-invalid @enderror" 
                        id="FechaInicio"
                        name="FechaInicio"
                        value="{{$actividad->getFechaInicio()}}"
                        title="Capturar el dia en el que se comenzara a realizar la actividad"
                    >
                
                    @error('FechaInicio')
                        <span class="invalid-feedback d_block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group col-md-6">
                    
                    <label for="FechaFin">Fecha Fin</label>
                    <input 
                        type="date" 
                        class="form-control @error('FechaFin') is-invalid @enderror" 
                        id="FechaFin"
                        name="FechaFin"
                        value="{{$actividad->getFechaFin()}}"
                        placeholder="Capturar el ultimo dia que realizara la actividad"
                    >
                
                    @error('FechaFin')
                        <span class="invalid-feedback d_block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

            </div>

            <button 
                type="submit" 
                class="btn btn-dark mb-1 mt-1" 
                name="programar_actividad"
                
            >
                Programar Actividad
            </button>

        </form>

    </div>


@endsection
