@extends('layouts.plantilla')
@section('titulo','Editar el producto')
@section('contenido')
<h1 class="text-3xl font-bold underline">Edición del producto</h1>
    <div class="grid grid-cols-2 gap-y-4 ml-10">
        <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <br>
            <div class="mb-1">
                <label>
                    <a class="font-semibold">Nombre: </a>
                    <input type="text" id="nombre" name="nombre" required value="{{ $producto->nombre }}" placeholder="--Introducir nombre--">
                </label>
            </div>
            <br>
            <hr><br>
            <div class="mb-1">
                <label>
                    <a class="font-semibold">Precio: </a>
                    <input type="number" id="precio" name="precio" required value="{{ $producto->precio }}" placeholder="--Introducir precio--">
                </label>
            </div>
            <br>
            <hr><br>
            <div class="mb-1">
                <label>
                    <a class="font-semibold">Familia: </a>
                    <select id="familia" name="familia">
                        @foreach($familias as $familia)
                            <option value="{{ $familia->id }}" {{ $producto->familia_id == $familia->id ? 'selected' : '' }}>{{ $familia->nombre }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <br>
            <div class="mb-1">
                <label>
                    <a class="font-semibold">Descripción: </a>
                    <br><br>
                    <textarea id="descripcion" name="descripcion" style="height: 150px;width: 400px;" required placeholder="--Introducir descripción--">{{ $producto->descripcion }}</textarea>
                </label>
                </div><br>
            <hr><br>
            <div class="mb-1">
                <a class="font-semibold">Imagen: </a>
                <input type="file" id="imagen" name="imagen" value="{{ $producto->imagen }}">
                <img src="{{ asset('assets/imagenes/' . $producto->imagen->url) }}" alt="{{ $producto->nombre }}">
            </div>
            <br>
            <hr><br>
            <div class="col-start-1 mb-10">
                <input type="submit" id="modificar" class="bverde" name="modificar" value="Modificar producto">
                <a href="/productos" class="bverde">Ver tienda</a>
            </div>

        </form>
    </div>
@endsection

