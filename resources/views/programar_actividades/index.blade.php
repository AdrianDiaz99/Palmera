@extends('layouts.app');

@section('opciones')

<a 
    class="dropdown-item" 
    href="{{ route('home.eventos', ['opcion' => "Predios"]) }}"
>
    Predios
</a>
<a 
    class="dropdown-item" 
    href="{{ route('home.eventos', ['opcion' => "ProgramarActividades"]) }}"
>
        Programar Actividades
</a>

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

        

        <form method="POST" action="{{ route('programar_actividades.events') }}">
            @csrf
            <div class="form-group">
                <label for="IdPredio">ID Predio</label>
                <input 
                    type="text" 
                    class="form-control @error('IdPredio') is-invalid @enderror" 
                    id="IdPredio"
                    name="IdPredio"
                    value="{{isset($predio)? $predio->getPreID() : ''}}"
                    {{isset($predio)? 'readonly' : ''}}
                >

                @error('IdPredio')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <button name="buscar" type="submit" class="btn btn-dark mb-4" data-toggle="tooltip">Buscar Predio</button>

            <div class="form-group">
                <label for="FactorLluvia">Factor de lluvia</label>
                <input 
                    disabled
                    type="text" 
                    class="form-control" 
                    id="FactorLluvia"
                    name="FactorLluvia" 
                    value="{{isset($predio)? $predio->getFactorLluvia() : ''}}"

                >

            </div>
            <div class="form-group">
                <label for="FactorHumedad">Factor de humedad</label>
                <input 
                    disabled
                    type="text" 
                    class="form-control" 
                    id="FactorHumedad"
                    name="FactorHumedad" 
                    value = "{{isset($predio)? $predio->getFactorHumedad() : ''}}"
                >

            </div>
            <div class="form-group">
                <label for="FactorResequedad">Factor de resequedad</label>
                <input 
                    disabled
                    type="text" 
                    class="form-control"
                    id="FactorResequedad" 
                    name="FactorResequedad"
                    value = "{{isset($predio)? $predio->getFactorResequedad() : ''}}"
                >

            </div>
            
            <div class="form-group">
                <label for="Hectareas">Hectareas</label>
                <input 
                    disabled
                    type="text" 
                    class="form-control" 
                    id="Hectareas"
                    name="Hectareas"
                    value = "{{isset($predio)? $predio->getHectareas() : ''}}"
                >

            </div>
            
            
            <div class="form-group">
                <label for="Hectareas">Tipo de Suelo</label>
                <input 
                    disabled
                    type="text" 
                    class="form-control" 
                    id="TipoSuelo"
                    name="TipoSuelo"
                    value = "{{isset($predio)? $predio->objetoTipoSuelo->getSueloNombre() : ''}}"
                >

            </div>

            
            <div class="form-group">
                <label for="Categoria">Categoria del predio</label>
                <input 
                    disabled
                    type="text" 
                    class="form-control" 
                    id="Categoria"
                    name="Categoria"
                    value = "{{isset($predio)? $predio->objetoCategoria->getCatNombre() : ''}}"
                >

            </div>
            
            <button
                name="programar_nueva_actividad" 
                class="btn btn-dark mb-1 mt-1 btn-lg btn-block"
                type="submit"
                {{isset($predio)? '' : 'disabled'}}
            >
                Programar nueva actividad
            </button>



        </form>

    </div>


@endsection
