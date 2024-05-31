@extends('layouts.plantilla')
@section('titulo','Carrito')
@section('contenido')
<h1 class="text-3xl font-bold underline">Carrito</h1>

@if(session('cart'))
@foreach (session('cart') as $producto)
<div class="grid grid-cols-3 gap-2">
    @if ($producto['imagen'] != null)
    <div class="px-5 py-8 border rounded border-green-500">
        <img src="{{ asset('assets/imagenes/' . $producto['imagen']) }}" alt="{{ $producto['nombre'] }}">
    </div>
    @endif
    <div class="col-span-2 px-5 py-8 border rounded border-green-500">
        <ul>
            <li>Nombre: <span class="font-light">{{ $producto['nombre'] }}</span></li>
            <hr>
            <li>Precio: <span class="font-light">{{ $producto['precio'] }}</span> €</li>
            <hr>
        </ul>
    </div>
    <div class="mt-4">
        <a href="{{route('productos.index')}}" class="bverde">Seguir comprando</a>
        <a href="{{ route('productos.finalizar') }}" class="bverde">Finalizar compra</a>
    </div>
</div>
@endforeach
@else
<p>No hay productos en el carrito.</p>
@endif

@endsection