@extends('layouts.plantilla')
@section('titulo','Tienda')
@section('contenido')
<h1 class="text-3xl font-bold underline">Los productos de la tienda</h1>
@foreach ($productos as $producto)
<div class="grid grid-cols-3 gap-2">
    @if ($producto->imagen!=null)
        <div class="px-5 py-8 border rounded border-green-500">
            <img src="{{asset('assets/imagenes/'.$producto->imagen->url)}}" alt="{{$producto->nombre}}">
        </div>
    @endif
    <div class="col-span-2 px-5 py-8 border rounded border-green-500">
        <ul>
            <li>Nombre: <span class="font-light">{{$producto->nombre}}</span></li>
            <hr>
            <li>Precio: <span class="font-light">{{$producto->precio}}</span> €</li>
            <hr>
            <li>Familia: <span class="font-light">{{$producto->familia->nombre}}</span></li>
            <hr>
            <li>Descripción: <span class="font-light">{{$producto->descripcion}}</span></li>
        </ul>
        <div class="mt-4">
            <a href="{{route('productos.show', $producto)}}" class="bverde">Ver producto</a>
        </div>
    </div>
</div>

@endforeach
@endsection
