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

    <h1 class="text-center mb-5">Palmera</h1>

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
            

        </form>

        <div class="table-wrapper">
            <div class="row">
                <div class="col-sm-8">
                    <h2><b>Palmeras</b></h2>
                </div>
            </div>
        <table class="text-center table table-ligth table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Estatus</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody class="thead-light ">
            @if(isset($predio))
                @foreach ($predio->Palmeras as $palmera)
                    <tr  class="">
                        <td>
                            {{ $palmera->getId() }}
                        </td>
                        <td>
                            {{ $palmera->getEstatus() == 1? 'Activa' : 'Dada de baja' }}
                        </td>
                        <td>
                            <a href="#" class="btn btn-success {{ $palmera->getEstatus() == 1? '' : 'disabled'}}">Ver</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>


@endsection
