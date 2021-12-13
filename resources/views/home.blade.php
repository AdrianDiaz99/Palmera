@extends('layouts.app')

@section('active_reference')
    {{ Breadcrumbs::render('home') }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="text-uppercase font-weight-bold">Ejecucion de procesos</h1>
            <img src="storage/recursos/logotipo.jpeg" alt="Palmera S.A. de C.V">
        </div>
    </div>
</div>
@endsection
