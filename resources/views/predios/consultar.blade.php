@extends('layouts.app')

@section('content')

    <div class="container-lg mt-2">

        <a 
            href="{{route('predios.index')}}" 
            class="btn btn-dark mb-3 mt-1" 
        >
            Regresar
        </a>

        <div class="table-wrapper">
            <div class="row">
                <div class="col-sm-8">
                    <h2><b>Detalle</b> de predios</h2>
                </div>
            </div>
            <table class="table table-ligth table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Factor de Lluvia</th>
                        <th>Factor de Humedad</th>
                        <th>Factor de Resequedad</th>
                        <th>Hectareas</th>
                        <th>Tipo De Suelo</th>
                        <th>Categoría</th>
                        <th>Estatus</th>
                        <th>Usuario Alta</th>
                    </tr>
                </thead>
                <tbody class="thead-light ">
                    
                    @foreach ($predios as $predio)
                        <tr class="{{ $predio->getEstatus() == 1? '' : 'table-danger'}}">
                            <td>{{ $predio->getPreID() }}</td>
                            <td>{{ $predio->getFactorLluvia() }}</td>
                            <td>{{ $predio->getFactorHumedad() }}</td>
                            <td>{{ $predio->getFactorResequedad() }}</td>
                            <td>{{ $predio->getHectareas() }}</td>
                            <td>{{ $predio->objetoTipoSuelo->getSueloNombre() }}</td>
                            <td>{{ $predio->objetoCategoria->getCatNombre() }}</td>
                            <td>{{ $predio->getEstatus() == 1 ? 'Activo' : 'Dado de baja' }}</td>
                            <td>{{ $predio->objetoEmpleado->getNombre() }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{$predios->links()}}
        </div>
    </div>

@endsection
