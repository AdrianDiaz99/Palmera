@extends('layouts.app');

@section('content')

    <div class="container-lg mt-2">

        <a 
            href="{{route('programar_actividades_palmeras.index')}}" 
            class="btn btn-dark mb-3 mt-1" 
        >
            Regresar
        </a>
        {{$predio->getPreID()}}
        <div class="table-wrapper">
            <div class="row">
                <div class="col-sm-8">
                    <h2><b>Palmeras</b></h2>
                </div>
            </div>
            <table class="table table-ligth table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Variedad</th>
                        <th>Categoria</th>
                        <th>Empleado</th>
                        <th>Estatus</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody class="thead-light ">
                    
                    @foreach ($palmeras as $palmera)
                        <tr class="{{ $palmera->getEstatus() == 1? '' : 'table-danger'}}">
                            <td>{{ $palmera->getId() }}</td>
                            <td>{{ $palmera->objetoVariedad->getVarNombre() }}</td>
                            <td>{{ $palmera->objetoCategoria->getCatNombre() }}</td>
                            <td>{{ $palmera->objetoEmpleado->getNombre() }}</td>
                            <td>{{ $palmera->getEstatus() == 1 ? 'Activo' : 'Dado de baja' }}</td>
                            <td><a href="#" class="btn btn-success {{ $palmera->getEstatus() == 1? '' : 'disabled'}}">Ver</a></td>
                        </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{$palmeras->links()}}
        </div>
    </div>

@endsection
