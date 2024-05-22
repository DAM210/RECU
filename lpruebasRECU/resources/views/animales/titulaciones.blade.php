@extends('layouts.plantilla')
@section('titulo', 'Zoologico')
@section('contenido')
    <h1 class="text-xl font-bold underline">Vista detallada de los cuidadores con título {{ $titulacion->nombre }}</h1>

    <div style="margin-left: 50px; margin-top: 25px">
        <ul>
            @foreach ($titulacion->cuidadores() as $cuidador)
                <li>Cuidador: <a href="{{ route('cuidador.show', $cuidador) }}">{{ $cuidador->nombre }}</a></li>
                <br>
                <hr><br>
            @endforeach
        </ul>
    </div>
    <br />
    <div style="margin-left: 50px">
        <a href="/animales" class="bverde">Volver al listado de animales</a>
    </div>
    <br />
@endsection
