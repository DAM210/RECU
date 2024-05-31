@extends('layouts.plantilla')
@section('titulo', 'Mostrar ' . $producto->nombre)
@section('contenido')
@csrf
@method('delete')

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

<h1 class="text-3xl font-bold underline">Vista en detalle del producto</h1>

<div class="grid grid-cols-3 gap-2">
    <div class="px-5 py-8">
        <img src="{{ asset('assets/imagenes/' . $producto->imagen->url) }}" alt="{{ $producto->imagen->url }}">
    </div>
    <div class="col-span-2 px-5 py-8">
        <ul>
            <li>{{ $producto->nombre }}</li>
            <hr>
            <li>Precio: <span class="font-light">{{ $producto->precio }}</span> €</li>
            <hr>
            <li>Familia: <span class="font-light">{{ $producto->familia->nombre }}</span></li>
            <hr>
            <li>Descripción: <span class="font-light">{{ $producto->descripcion }}</span></li>
            <hr>
        </ul>
    </div>
    <div class="col-span-2 px-5 py-8">
        <a href="{{ route('productos.edit', $producto) }}" class="bverde">Editar producto</a>
        <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bverde">Eliminar producto</button>
        </form>
        @if(auth()->check())
        <form action="{{ route('productos.sesion', $producto) }}" method="POST" style="display:inline">
                @csrf
                <button type="submit" class="bverde">Añadir a la cesta</button>
            </form>
        @else
            <button class="bverde" disabled>Añadir a la cesta</button>
        @endif
        <a href="{{ route('productos.index') }}" class="bverde">Volver a la tienda</a>
    </div>
    <br><br>
</div>

@endsection