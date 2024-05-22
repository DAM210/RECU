@extends("layouts.plantilla")
@section("titulo","Zoologico")
@section("contenido")

<h1 class="text-3xl font-bold underline">Crear una revisión para el animal<span class="negrita"> {{$animal->especie}}</span></h1>

<div class="grid grid-cols-3 gap-2">
    <div class="col-span-2 px-5 py-8">
        <form action="{{route('revision.store',$animal)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8 px-5 py-8">
                <ul>
                    <li>Fecha: <input type="date" id="fechaRevision" name="fechaRevision" require></li>
                    <br>
                    <li>Descripción:<br><textarea class="font-light" id="descripcion" name="descripcion" style="height: 150px;width: 400px;" require  placeholder="-- Introducir descripción --"></textarea></li>
                </ul>
            </div>
            <div class="col-start-1 mb-10">
                <input href="/animales/{{$animal->slug}}" type="submit" id="anyadir" class="bverde" name="anyadir" value="Añadir revisión">
            </div>
        </form>
    </div>
    @endsection
