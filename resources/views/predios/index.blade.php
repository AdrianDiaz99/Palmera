@extends('layouts.app');

@section('content')

    <h1 class="text-center mb-5">Predios</h1>

    <div class="col-md-5 mx-auto bg-white p-3">
        <form method="post" action="{{route('predios.store')}}">
            @csrf

            <div class="form-group">
              <label for="IdPredio">ID Predio</label>
              <input type="text" class="form-control @error('IdPredio') is-invalid @enderror" id="IdPredio" name="IdPredio">

              @error('IdPredio')
                <span class="invalid-feedback d_block" role="alert">
                  <strong>{{$message}}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="FactorLluvia">Factor de lluvia</label>
              <input 
                type="text" 
                class="form-control @error('FactorLluvia') is-invalid @enderror"  
                id="FactorLluvia" 
                placeholder="Indicador de lluvia" 
                name="FactorLluvia"
                value={{old("FactorLluvia")}}
              >

              @error('FactorLluvia')
                <span class="invalid-feedback d_block" role="alert">
                  <strong>{{$message}}</strong>
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
                value={{old("FactorHumedad")}}
              >

              @error('FactorHumedad')
                <span class="invalid-feedback d_block" role="alert">
                  <strong>{{$message}}</strong>
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
                value={{old("FactorResequedad")}}
              >

              @error('FactorResequedad')
                <span class="invalid-feedback d_block" role="alert">
                  <strong>{{$message}}</strong>
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
                value={{old("Hectareas")}}
              >

              @error('Hectareas')
                <span class="invalid-feedback d_block" role="alert">
                  <strong>{{$message}}</strong>
                </span>
              @enderror

            </div>
            <button type="" class="btn btn-dark mb-1 mt-1">Recuperar</button>
            <button type="submit" class="btn btn-dark mb-1 mt-1">Grabar</button>
            <button type="" class="btn btn-dark mb-1 mt-1">Borrar</button>
            <button type="" class="btn btn-dark mb-1 mt-1">Actualizar</button>
            <button type="" class="btn btn-dark mb-1 mt-1">Consultar</button>
            <button type="" class="btn btn-dark mb-1 mt-1">Limpiar</button>
          </form>
    </div>


@endsection