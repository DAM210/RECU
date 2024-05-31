@extends('layouts.plantilla')
@section('titulo', 'Alta del producto')
@section('contenido')

<h1 class="text-3xl font-bold underline">Alta del producto</h1>
<div class="grid grid-cols-2 gap-y-4 ml-10">
    <form action="{{ route('productos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-1">
            <label>
                <a>Nombre: </a>
                <input type="text" id="nombre" name="nombre" required placeholder="--Introducir nombre--">
            </label>
            @error("nombre")
            <span>{{$message}}</span>
            @enderror
        </div>
        <div class="mb-1">
            <label>
                <a>Precio: </a>
                <input type="text" id="precio" name="precio" required placeholder="--Introducir precio--">
            </label>
            @error("precio")
            <span>{{$message}}</span>
            @enderror
        </div>
        <div class="mb-1">
            <label>
                <a>Familia: </a>
                <select id="familia" name="familia">
                    @foreach($familias as $familia)
                    <option value="{{ $familia->id }}">{{ $familia->nombre }}</option>
                    @endforeach
                </select>

            </label>
            @error("familia")
            <span>{{$message}}</span>
            @enderror
        </div>
        <div class="mb-1">
            <label>
                <a>Imagen: </a>
                <input type="file" id="imagen" name="imagen">
            </label>
            @error("imagen")
            <span>{{$message}}</span>
            @enderror
        </div>
        <div class="mb-1">
            <label>
                <a class="font-semibold">Descripción del producto: </a>
                <br><br>
                <textarea id="descripcion" name="descripcion" style="height: 150px;width: 400px;" required placeholder="--Introducir descripción--"></textarea>
            </label>
            @error("descripcion")
            <span>{{$message}}</span>
            @enderror
        </div>
        <div class="col-start-1 mb-10">
            <input type="submit" id="anyadir" class="bverde" name="anyadir" value="Añadir producto">
            <a href="/productos" class="bverde">Ver tienda</a>
        </div>
    </form>
</div>
@endsection