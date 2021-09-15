@extends('layouts.plantillaBase')

@section('contenido')
    <h2 style="margin: 1rem; padding: 1rem; text-align: center;">CREAR VEHICULO</h2>

    @if ($errors->any())
    <div class="alert alert-danger" style="margin: 1rem; padding: 1rem; text-align: center;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/vehiculo" style="max-width: 420px; dysplay: block; margin: 0 auto" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Placa</label>
            <input id="placa" name="placa" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Color</label>
            <input id="color" name="color" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo de vehiculo</label>
            <select name="tipo" id="tipo" class="form-select" aria-label=".form-select-sm example">
                <option selected value="">Seleccionar..</option>
                <option value="particular">Particular</option>
                <option value="publico">Publico</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Conductor</label>
            <select name="conductor" id="conductor" class="form-select" aria-label=".form-select-sm example">
                <option selected value="">Seleccionar..</option>
                @foreach ($conductores as $conductor)
                <option value="{{ $conductor->id }}">{{ $conductor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Propietario</label>
            <select name="propietario" id="propietario" class="form-select" aria-label=".form-select-sm example">
                <option selected value="">Seleccionar..</option>
                @foreach ($propietarios as $propietario)
                <option value="{{ $propietario->id }}">{{ $propietario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div style="text-align: center">
            <a href="/vehiculo" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
@endsection