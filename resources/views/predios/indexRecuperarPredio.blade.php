@extends('layouts.app');

@section('content')

    <h1 class="text-center mb-5">Predios</h1>

    <div class="col-md-8 mx-auto bg-white p-3">
        <form method="post" action="">
            @csrf

            <div class="form-group">
                <label for="IdPredio">ID Predio</label>
                <input disabled value="{{ $predio->id }}" type="text"
                    class="form-control @error('IdPredio') is-invalid @enderror" id="IdPredio" name="IdPredio">

                <div class="form-group">
                    <label for="FactorLluvia">Factor de lluvia</label>
                    <input disabled value="{{ $predio->FactorLluvia }}" type="text"
                        class="form-control @error('FactorLluvia') is-invalid @enderror" id="FactorLluvia"
                        placeholder="Indicador de lluvia" name="FactorLluvia" value={{ old('FactorLluvia') }}>

                </div>
                <div class="form-group">
                    <label for="FactorHumedad">Factor de humedad</label>
                    <input disabled value="{{ $predio->FactorHumedad }}" type="text"
                        class="form-control @error('FactorHumedad') is-invalid @enderror" id="FactorHumedad"
                        placeholder="Indicador de humedad" name="FactorHumedad" value={{ old('FactorHumedad') }}>

                </div>
                <div class="form-group">
                    <label for="FactorResequedad">Factor de resequedad</label>
                    <input disabled value="{{ $predio->FactorResequedad }}" type="text"
                        class="form-control @error('FactorResequedad') is-invalid @enderror" id="FactorResequedad"
                        placeholder="Indicador de resequedad" name="FactorResequedad" value={{ old('FactorResequedad') }}>

                </div>
                <div class="form-group">
                    <label for="Hectareas">Hectareas</label>
                    <input disabled value="{{ $predio->Hectareas }}" type="text"
                        class="form-control @error('Hectareas') is-invalid @enderror" id="Hectareas"
                        placeholder="Cantidad de hectareas" name="Hectareas" value={{ old('Hectareas') }}>

                </div>

                <a href="{{ action('PredioController@index') }}" class="btn btn-dark mb-1 mt-1">Regresar</a>

        </form>

    </div>

@endsection
