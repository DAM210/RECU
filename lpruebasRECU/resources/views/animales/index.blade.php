@extends('layouts.plantilla')
@section('titulo','Zoológico')
@section('contenido')
<h1 class="text-3xl font-bold underline">Listado de animales</h1>
@foreach ($animales as $animal)
<div class="grid grid-cols-3 gap-2">
    <div class="px-5 py-8 border rounded border-green-500">
        <img src="{{asset('assets/imagenesAnimales/'.$animal->imagen)}}" alt="{{$animal->especie}}">
    </div>
    <div class="col-span-2 px-5 py-8 border rounded border-green-500">
        <h2 class="text-lg font-semibold">
            <a href="{{route('animales.show',$animal)}}">
                {{$animal->especie}}
            </a>
        </h2>

        <ul>
            <li>Peso: <span class="font-light">{{$animal->peso}}</span> kg</li>
            <hr>
            <li>Altura: <span class="font-light">{{$animal->altura}}</span> cm</li>
            <hr>
            <li>Fecha de nacimiento: <span class="font-light">{{$animal->fechaNacimiento}}</span></li>
            <hr>
            <li>Alimentación: <span class="font-light">{{$animal->alimentacion}}</span></li>
            <hr>
            <li>Descripción: <span class="font-light">{{$animal->descripcion}}</span></li>
        </ul>
    </div>
</div>

@endforeach
@endsection
