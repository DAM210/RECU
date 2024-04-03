<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Hoja 6</title>
</head>

<body>

<?php
    require_once('Volador.interface.php');
    require_once('ElementoVolador.class.php');
    require_once('Avion.class.php');
    require_once('Helicoptero.class.php');
    require_once('Aeropuerto.class.php');

    //Crear aviones y helicopteros
    $avion1=new Avion("Avion1",2,2,200,800,"Compañia1","17-10-2023",1500);
    $avion2=new Avion("Avion2",2,2,500,860,"Compañia1","10-11-2023",1500);
    $heli1=new Helicoptero("Helicoptero1",4,1,100,175,"Paco",2);
    $heli2=new Helicoptero("Helicoptero2",4,1,200,275,"Andrea",4);

    $array=[$avion1,$avion2,$heli1];

    //Crear aeropuerto
    $aeropuerto=new Aeropuerto($array);

    //Insertar aviones
    $aeropuerto->insertar($heli2);
    $aeropuerto->buscar("Helicoptero1");
    $aeropuerto->listarCompania("Compañia1");
    $aeropuerto->rotores(4);
    $aeropuerto->despegar("Avion2",1200,900);

?>
</body>
<html>