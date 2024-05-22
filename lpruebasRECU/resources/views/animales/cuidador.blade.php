@extends("layouts.plantilla")
@section("titulo","Mostrar ".$cuidador['nombre'])
@section("contenido")
<h1 class="text-3xl font-bold underline">Vista detallada del cuidador {{$cuidador->nombre}}</h1>

    <form action="" method="GET">
        <div style="margin-left: 50px; margin-top: 25px">
        <ul>
        @foreach($cuidador->titulaciones() as $titulacion)
            <li>Titulación: <a class="font-light" href="{{route('titulaciones.show',$titulacion)}}">{{$titulacion->nombre}}</a></li>
            <br><hr><br>
        @endforeach
        </div>
        <br/>
        <br/>
        <div style="margin-left: 50px">
            <a href="/animales" class="bverde">Volver al listado</a>
        </div>
    </form>
    <br/>
@endsection
