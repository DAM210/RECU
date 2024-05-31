@extends('layouts.plantilla')
@section('titulo','Gracias')
@section('contenido')

<h1 class="text-3xl font-bold underline">Gracias por su compra</h1>

<div class="grid grid-cols-3 gap-2">

    <p>Ha realizado una compra de {{$total}} €.</p>
</div>
<div class="mt-4">
    <a href="{{route('productos.index')}}" class="bverde">Volver a la tienda</a>
</div>

@endsection