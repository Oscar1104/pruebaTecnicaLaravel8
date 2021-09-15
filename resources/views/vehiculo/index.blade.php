@extends('layouts.plantillaBase')

@section('contenido')
<div class="row">
    <div class="col float-center">
        <a href="vehiculo/create" class="btn btn-primary ">CREAR</a>
    </div>
    <div class="col">
        <h2>VEHICULOS</h2>
    </div>
</div>

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Placa</th>
                <th scope="col">Color</th>
                <th scope="col">Marca</th>
                <th scope="col">Tipo</th>
                <th scope="col">Conductor</th>
                <th scope="col">Propietario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehiculos as $vehiculo)
            <tr>
                <th>{{ $vehiculo->id }}</th>
                <th>{{ $vehiculo->placa }}</th>
                <th>{{ $vehiculo->color }}</th>
                <th>{{ $vehiculo->marca }}</th>
                <th>{{ $vehiculo->tipo }}</th>
                <th>{{ $vehiculo->conductor }}</th>
                <th>{{ $vehiculo->propietario }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection