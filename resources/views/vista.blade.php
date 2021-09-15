@extends('layouts.plantillaBase')

@section('contenido')
<div class="row">
    <div class="col" style="margin: 1px; padding: 1px; text-align: center;">
        <h2>REGISTROS</h2>
    </div>
</div>

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Placa</th>
                <th scope="col">Marca</th>
                <th scope="col">Conductor</th>
                <th scope="col">Propietario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
            <tr>
                <th>{{ $registro->placa }}</th>
                <th>{{ $registro->marca }}</th>
                <th>{{ $registro->conductor }}</th>
                <th>{{ $registro->propietario }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection