@extends('layouts.plantillaBase')

@section('contenido')
<div class="row">
    <div class="col float-center">
        <a href="propietario/create" class="btn btn-primary">CREAR</a>
    </div>
    <div class="col">
        <h2>PROPIETARIOS</h2>
    </div>
</div>

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Numero cedula</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Ciudad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($propietarios as $propietario)
            <tr>
                <th>{{ $propietario->id }}</th>
                <th>{{ $propietario->numeroCedula }}</th>
                <th>{{ $propietario->nombres }}</th>
                <th>{{ $propietario->apellidos }}</th>
                <th>{{ $propietario->direccion }}</th>
                <th>{{ $propietario->telefono }}</th>
                <th>{{ $propietario->ciudad }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection