@extends('layouts.app')

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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">...</div>
                
            </div>
        </div>
    </div>
</div>
@endsection
