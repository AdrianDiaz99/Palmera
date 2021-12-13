@extends('layouts.app')

@section('active_reference')
    {{ Breadcrumbs::render('actividades_predios.seleccionarPredio', $predio) }}
@endsection

@section('content')

    <div class="container-lg mt-2">

        @if (\Session::has('error'))

            <div class="alert alert-danger">
                <p>{{ \Session::get('error') }}</p>
            </div>

        @endif

        @if (\Session::has('success'))

            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>

        @endif

        <div class="table-wrapper">

            <div class="row">
                <div class="col-sm-12">
                    <h2>Programacion de actividades a las palmeras del <b>Predio {{$predio->getPreID()}}</b></h2>
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
                                        route("actividades_predios.agregar_actividad", [
                                            'predio' => $predio->getPreID(),
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
