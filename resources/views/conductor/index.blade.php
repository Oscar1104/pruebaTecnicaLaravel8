@extends('layouts.plantillaBase')

@section('contenido')
<div class="row">
    <div class="col float-center">
        <a href="conductor/create" class="btn btn-primary">CREAR</a>
    </div>
    <div class="col">
        <h2>CONDUCTORES</h2>
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
            @foreach ($conductores as $conductor)
            <tr>
                <th>{{ $conductor->id }}</th>
                <th>{{ $conductor->numeroCedula }}</th>
                <th>{{ $conductor->nombres }}</th>
                <th>{{ $conductor->apellidos }}</th>
                <th>{{ $conductor->direccion }}</th>
                <th>{{ $conductor->telefono }}</th>
                <th>{{ $conductor->ciudad }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection