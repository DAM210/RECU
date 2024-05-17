@extends('layouts.plantilla')
@section('titulo', 'Zoológico')
@section('contenido')

    <div class="grid grid-cols-2 gap-y-4 ml-10">
        <form action="{{ route('animales.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-1">
                <label>
                    <a>Especie del animal: </a>
                    <input type="text" id="especie" name="especie" required placeholder="--Introducir especie--">
                </label>
            </div>
            <div class="mb-1">
                <label>
                    <a>Peso del animal: </a>
                    <input type="text" id="peso" name="peso" required placeholder="--Introducir peso--">
                </label>
            </div>
            <div class="mb-1">
                <label>
                    <a>Altura del animal: </a>
                    <input type="text" id="altura" name="altura" required placeholder="--Introducir altura--">
                </label>
            </div>
            <div class="mb-1">
                <label>
                    <a>Fecha de nacimiento del animal: </a>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" required>
                </label>
            </div>
            <div class="mb-1">
                <label>
                    <a>Imagen del animal: </a>
                    <input type="file" id="imagen" name="imagen" required>
                </label>
            </div>
            <div class="mb-1">
                <label>
                    <a>Alimentacion del animal: </a>
                    <input type="text" id="alimentacion" name="alimentacion" required
                        placeholder="--Introducir alimentación--">
                </label>
            </div>
            <div class="mb-1">
                <label>
                    <a class="font-semibold">Descripción del animal: </a>
                    <br><br>
                    <textarea id="descripcion" name="descripcion" style="height: 150px;width: 400px;" required
                        placeholder="--Introducir descripción--"></textarea>
                </label>
            </div>
            <div class="col-start-1 mb-10">
                <input type="submit" id="anyadir" class="bverde" name="anyadir" value="Añadir animal">
                <a href="/animales" class="bverde">Ver listado de animales</a>
            </div>
        </form>
    </div>
@endsection
