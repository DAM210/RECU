@extends('layouts.plantilla')
@section('titulo','Mostrar '.$animal->especie)
@section('contenido')
<h1 class="text-3xl font-bold underline">Vista en detalle del {{$animal->especie}}</h1>


<div class="grid grid-cols-3 gap-2">
    <div class="px-5 py-8">
        <img src="{{asset('assets/imagenesAnimales/'.$animal->imagen)}}" alt="{{$animal->imagen}}">
    </div>
    <div class="col-span-2 px-5 py-8">
        <ul>
            <li>{{$animal->especie}} kg</li>
            <hr>
            <li>Peso: <span class="font-light">{{$animal->peso}}</span> kg</li>
            <hr>
            <li>Altura: <span class="font-light">{{$animal->altura}}</span> cm</li>
            <hr>
            <li>Fecha de nacimiento: <span class="font-light">{{$animal->fechaNacimiento}}</span></li>
            <hr>
            <li>Alimentación: <span class="font-light">{{$animal->alimentacion}}</span></li>
            <hr>
            <li>Descripción: <span class="font-light">{{$animal->descripcion}}</span></li>
            <hr>
            <li>Revisiones: <span class="font-light">
                    @foreach ($animal->revisiones as $revision)
                        <br>
                        {{ $revision->fechaRevision }} {{ $revision->descripcion }}
                    @endforeach
                </span>
            </li>
            <hr>
            <li>Cuidadores: <span class="font-light">
                    <ul>
                        @foreach ($animal->cuidadores as $cuidador)
                            <li>
                                {{ $cuidador->nombre }}
                            </li>
                        @endforeach
                    </ul>
                </span>
            </li>
        </ul>
    </div>
    <div class="col-span-2 px-5 py-8">
        <a href="{{route('animales.edit',$animal)}}" class="bverde">Editar Animal</a>
        <a href="{{ route('animales.revision', $animal) }}" class="bverde">Añadir revisión</a>
        <a href="{{route('animales.index')}}" class="bverde">Volver al listado</a>
    </div>
    <br><br>
</div>

@endsection
