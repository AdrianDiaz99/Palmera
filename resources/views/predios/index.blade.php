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

        <form action="{{ route('predios.recuperar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="IdPredio">ID Predio</label>
                <input type="text" class="form-control @error('IdPredio') is-invalid @enderror" id="IdPredio"
                    name="IdPredio">

            </div>

            <button type="submit" class="btn btn-dark mb-1 mt-1" data-toggle="tooltip">Recuperar
            </button>
        </form>

        <form method="POST" action="{{ route('predios.store') }}">
            @csrf



            <div class="form-group">
                <label for="FactorLluvia">Factor de lluvia</label>
                <input type="text" class="form-control @error('FactorLluvia') is-invalid @enderror" id="FactorLluvia"
                    placeholder="Indicador de lluvia" name="FactorLluvia" value={{ old('FactorLluvia') }}>

                @error('FactorLluvia')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="form-group">
                <label for="FactorHumedad">Factor de humedad</label>
                <input type="text" class="form-control @error('FactorHumedad') is-invalid @enderror" id="FactorHumedad"
                    placeholder="Indicador de humedad" name="FactorHumedad" value={{ old('FactorHumedad') }}>

                @error('FactorHumedad')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="form-group">
                <label for="FactorResequedad">Factor de resequedad</label>
                <input type="text" class="form-control @error('FactorResequedad') is-invalid @enderror"
                    id="FactorResequedad" placeholder="Indicador de resequedad" name="FactorResequedad"
                    value={{ old('FactorResequedad') }}>

                @error('FactorResequedad')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="form-group">
                <label for="Hectareas">Hectareas</label>
                <input type="text" class="form-control @error('Hectareas') is-invalid @enderror" id="Hectareas"
                    placeholder="Cantidad de hectareas" name="Hectareas" value={{ old('Hectareas') }}>

                @error('Hectareas')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <button type="submit" class="btn btn-dark mb-1 mt-1">Grabar</button>
            <a href="{{ action('PredioController@index') }}" class="btn btn-dark mb-1 mt-1">Limpiar</a>
        </form>

        <div class="container-lg mt-2">
            <div class="table-wrapper">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><b>Detalle</b> de predios</h2>
                    </div>
                </div>
                <table class="table table-ligth table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Factor de Lluvia</th>
                            <th>Factor de Humedad</th>
                            <th>Factor de Resequedad</th>
                            <th>Hectareas</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    {{$predios}}

                        @foreach ($predios as $predio)
                            <tr>
                                <td>{{ $predio->id }}</td>
                                <td>{{ $predio->FactorLluvia }}</td>
                                <td>{{ $predio->FactorHumedad }}</td>
                                <td>{{ $predio->FactorResequedad }}</td>
                                <td>{{ $predio->Hectareas }}</td>
                                <td>
                                    <a href="{{ action('PredioController@edit', $predio->id) }}"
                                        class="btn btn-success mb-1 mt-1" data-toggle="tooltip">Actualizar
                                    </a>
                                    <form action="{{ action('PredioController@destroy', $predio->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger mb-1 mt-1"
                                            data-toggle="tooltip">Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
