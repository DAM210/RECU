@extends('layouts.plantilla')
@section('titulo','Editar '.$animal->especie)
@section('contenido')

    <div class="grid grid-cols-2 gap-y-4 ml-10">
        <form action="{{ route('animales.update', $animal) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <br>
            <div class="mb-1">
                <label>
                    <a class="font-semibold">Especie del animal: </a>
                    <input type="text" id="especie" name="especie" required value="{{ $animal->especie }}"
                        placeholder="--Introducir especie--">
                </label>
            </div>
            <br>
            <hr><br>
            <div class="mb-1">
                <label>
                    <a class="font-semibold">Peso del animal: </a>
                    <input type="text" id="peso" name="peso" required value="{{ $animal->peso }}"
                        placeholder="--Introducir peso--">
                </label>
            </div>
            <br>
            <hr><br>
            <div class="mb-1">
                <label>
                    <a class="font-semibold">Altura del animal: </a>
                    <input type="text" id="altura" name="altura" required value="{{ $animal->altura }}"
                        placeholder="--Introducir altura--">
                </label>
            </div>
            <br>
            <hr><br>
            <div class="mb-1">
                <label>
                    <a class="font-semibold">Fecha de nacimiento del animal: </a>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" required
                        value="{{ $animal->fechaNacimiento }}">
                </label>
            </div>
            <br>
            <hr><br>
            <div class="mb-1">
                <a class="font-semibold">Imagen del animal: </a>
                <input type="file" id="imagen" name="imagen" required value="{{ $animal->imagen }}">
                <img src="{{ asset('assets/imagenesAnimales/' . $animal->imagen) }}" alt="{{ $animal->especie }}">
            </div>
            <br>
            <hr><br>
            <div class="mb-1">
                <label>
                    <a class="font-semibold">Alimentacion del animal: </a>
                    <input type="text" id="alimentacion" name="alimentacion" required
                        value="{{ $animal->alimentacion }}" placeholder="--Introducir alimentación--">
                </label>
            </div>
            <br>
            <hr><br>
            <div class="mb-1">
                <label>
                    <a class="font-semibold">Descripción del animal: </a>
                    <br><br>
                    <textarea id="descripcion" name="descripcion" style="height: 150px;width: 400px;" required
                        placeholder="--Introducir descripción--">{{ $animal->descripcion }}</textarea>
                </label>
            </div><br>
            <div class="col-start-1 mb-10">
                <input type="submit" id="modificar" class="bverde" name="modificar" value="Modificar animal">
                <a href="/animales" class="bverde">Ver listado de animales</a>
            </div>

        </form>
    </div>
@endsection
