@extends('layouts.app');


@section('content')
    <div class="mt-5">
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
            <form method="POST" action="{{ route('programar_actividades_palmeras.buscarPredio') }}">
                @csrf
                <div class="form-group">
                    <label for="IdPredio">ID Predio</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="IdPredio"
                        name="IdPredio"
                        value="{{isset($predio)? $predio->getPreID() : ''}}"
                        {{isset($predio)? 'readonly' : ''}}
                    >

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

                <button name="buscar" type="submit" class="btn btn-dark mb-4" data-toggle="tooltip">Buscar</button>

            
            </form>

            <div class="table-wrapper">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><b>Predios</b></h2>
                    </div>
                </div>
                <table class="table table-ligth table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tipo De Suelo</th>
                            <th>Categoría</th>
                            <th>Estatus</th>
                            <th>Usuario Alta</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>
                    <tbody class="thead-light ">
                        @if(isset($predios))
                            @foreach ($predios as $predio)
                                <tr class="{{ $predio->getEstatus() == 1? '' : 'table-danger'}}">
                                    <td>{{ $predio->getPreID() }}</td>
                                    <td>{{ $predio->objetoTipoSuelo->getSueloNombre() }}</td>
                                    <td>{{ $predio->objetoCategoria->getCatNombre() }}</td>
                                    <td>{{ $predio->getEstatus() == 1 ? 'Activo' : 'Dado de baja' }}</td>
                                    <td>{{ $predio->objetoEmpleado->getNombre() }}</td>
                                    <td><a href="{{route('programar_actividades_palmeras.showPalmerasPredio', ['predio' => $predio->getPreID()])}}" class="btn btn-success {{ $predio->getEstatus() == 1? '' : 'disabled'}}">Ver</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @if(isset($predios))
                    {{$predios->links()}}
                @endif
            
        </div>
    </div>

@endsection
