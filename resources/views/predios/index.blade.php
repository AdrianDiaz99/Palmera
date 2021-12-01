@extends('layouts.app');

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

        <form method="POST" action="{{ route('predios.postEvents') }}">
            @csrf

            <div class="form-group">
                <label for="IdPredio">ID Predio</label>
                <input 
                    type="text" 
                    class="form-control @error('IdPredio') is-invalid @enderror" 
                    id="IdPredio"
                    name="IdPredio"
                    value="{{isset($predio)? $predio->getPreID() : old('IdPredio')}}"
                    {{isset($predio)? 'readonly' : ''}}
                >

                @error('IdPredio')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <button name="recuperar" type="submit" class="btn btn-dark mb-4" data-toggle="tooltip">Recuperar</button>

            <div class="form-group">
                <label for="FactorLluvia">Factor de lluvia</label>
                <input 
                    type="text" 
                    class="form-control @error('FactorLluvia') is-invalid @enderror" 
                    id="FactorLluvia"
                    placeholder="Indicador de lluvia" 
                    name="FactorLluvia" 
                    value="{{isset($predio)? $predio->getFactorLluvia() : old('FactorLluvia')}}"

                >

                @error('FactorLluvia')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="form-group">
                <label for="FactorHumedad">Factor de humedad</label>
                <input 
                    type="text" 
                    class="form-control @error('FactorHumedad') is-invalid @enderror" 
                    id="FactorHumedad"
                    placeholder="Indicador de humedad" 
                    name="FactorHumedad" 
                    value = "{{isset($predio)? $predio->getFactorHumedad() : old('FactorHumedad')}}"
                >

                @error('FactorHumedad')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="form-group">
                <label for="FactorResequedad">Factor de resequedad</label>
                <input 
                    type="text" 
                    class="form-control @error('FactorResequedad') is-invalid @enderror"
                    id="FactorResequedad" 
                    placeholder="Indicador de resequedad" 
                    name="FactorResequedad"
                    value = "{{isset($predio)? $predio->getFactorResequedad() : old('FactorResequedad')}}"
                >

                @error('FactorResequedad')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            
            <div class="form-group">
                <label for="Hectareas">Hectareas</label>
                <input 
                    type="text" 
                    class="form-control @error('Hectareas') is-invalid @enderror" 
                    id="Hectareas"
                    placeholder="Cantidad de hectareas" 
                    name="Hectareas"
                    value = "{{isset($predio)? $predio->getHectareas() : old('Hectareas')}}"
                >

                @error('Hectareas')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="TipoSuelo">Tipo de Suelo</label>
                <select 
                    class="form-control @error('TipoSuelo') is-invalid @enderror" 
                    id="TipoSuelo"
                    placeholder="Ingrese el tipo de suelo del predio" 
                    name="TipoSuelo"
                >
                    <option value="">-- Seleccione --</option>
                    @foreach( $tiposSuelo as $tipoSuelo)
                        <option 
                            value="{{$tipoSuelo->getSueloId()}}" 
                            {{($tipoSuelo->getSueloId() == old('TipoSuelo') || (isset($predio)? $tipoSuelo->getSueloId() == $predio->getTipoSuelo() : false))? 'selected' : ''}}
                        >
                            {{$tipoSuelo->getSueloNombre()}}
                        </option>
                    @endforeach
                </select>

                @error('TipoSuelo')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            
            <div class="form-group">
                <label for="Categoria">Categoría del predio</label>
                <select 
                    class="form-control @error('Categoria') is-invalid @enderror" 
                    id="Categoria"
                    placeholder="Ingrese la categoria del predio" 
                    name="Categoria"
                >
                    <option value="">-- Seleccione --</option>
                    @foreach( $categorias as $categoria)
                        <option 
                            value="{{$categoria->getId()}}" 
                            {{($categoria->getId() == old('Categoria') || (isset($predio)? $categoria->getId() == $predio->getCategoria() : false))? 'selected' : ''}}
                        >
                            {{$categoria->getCatNombre()}}
                        </option>
                    @endforeach
                </select>

                @error('Categoria')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <button 
                type="submit" 
                class="btn btn-dark mb-1 mt-1" 
                name="grabar"
                {{isset($predio)? 'disabled' : ''}}
            >
                Grabar
            </button>

            <button 
                type="submit" 
                class="btn btn-dark mb-1 mt-1" 
                name="actualizar"
                {{isset($predio)? '' : 'disabled'}}
            >
                Actualizar
            </button>

            <button 
                type="submit" 
                class="btn btn-dark mb-1 mt-1" 
                name="eliminar"
                {{isset($predio)? '' : 'disabled'}}
            >
                Eliminar
            </button>

            <a 
                href="{{route('predios.consultar')}}" 
                class="btn btn-dark mb-1 mt-1" 
            >
                Consultar
            </a>

            <a href="{{ action('PredioController@index') }}" class="btn btn-dark mb-1 mt-1">Limpiar</a>
        </form>

    </div>


@endsection
