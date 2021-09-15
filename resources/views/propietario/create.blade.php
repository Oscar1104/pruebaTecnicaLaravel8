@extends('layouts.plantillaBase')

@section('contenido')
    <h2 style="margin: 1rem; padding: 1rem; text-align: center;">CREAR PROPIETARIO</h2>

    @if ($errors->any())
    <div class="alert alert-danger" style="margin: 1rem; padding: 1rem; text-align: center;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/propietario" style="max-width: 420px; dysplay: block; margin: 0 auto" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Numero cedula</label>
            <input id="cedula" name="cedula" type="number" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Primer nombre</label>
            <input id="pNombre" name="pNombre" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Segundo nombre</label>
            <input id="sNombre" name="sNombre" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellidos</label>
            <input id="apellidos" name="apellidos" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Dirección</label>
            <input id="direccion" name="direccion" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Teléfono</label>
            <input id="telefono" name="telefono" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ciudad</label>
            <select name="ciudad" id="ciudad" class="form-select" aria-label=".form-select-sm example">
                <option selected value="">Seleccionar..</option>
                @foreach ($ciudades as $ciudad)
                <option value="{{$ciudad->id}}">{{$ciudad->nombreCiudad}}</option>
                @endforeach
            </select>
        </div>
        <div style="text-align: center">
            <a href="/propietario" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
@endsection