@extends('layouts.app')

@section('content')

    <div class="container-lg mt-2">

        <a 
            href="{{route('actividades_palmeras.index')}}" 
            class="btn btn-dark mb-3 mt-1" 
        >
            Regresar
        </a>

        <div class="table-wrapper">

            <div class="row">
                <div class="col-sm-8">
                    <h2>Programacion de actividades a la <b>Palmera {{$palmera->getId()}}</b></h2>
                </div>
            </div>
            <table class="table table-ligth table-hover table-bordered text-center ">
                <thead class="thead-dark ">
                    <tr>
                        <th>Actividad</th>
                        <th>Descripcion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="thead-light">
                    
                    @foreach ($actividades as $actividad)
                        <tr>
                            <td>
                                {{ $actividad->getNombre() }}
                            </td>
                            <td>{{ $actividad->getDescripcion() }}</td>
                            <td>
                                <a 
                                    href="{{
                                        route("actividades_palmeras.agregar_actividad", [
                                            'palmera' => $palmera->getId(), 
                                            'actividad' => $actividad->getId()
                                        ])}}" 
                                    class="btn btn-success">Programar</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
