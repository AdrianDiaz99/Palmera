@extends('layouts.app');

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
                        <th>Organico</th>
                    </tr>
                </thead>
                <tbody class="thead-light ">
                    
                    @foreach ($predios as $predio)
                        <tr>
                            <td>{{ $predio->id }}</td>
                            <td>{{ $predio->FactorLluvia }}</td>
                            <td>{{ $predio->FactorHumedad }}</td>
                            <td>{{ $predio->FactorResequedad }}</td>
                            <td>{{ $predio->Hectareas }}</td>
                            <td>{{ $predio->Organico }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
