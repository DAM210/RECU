<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 Tema 3</title>
</head>

<body>
    <?php

    require_once("Circulo.class.php");

    $nombre="radio";

    $circulo=new Circulo(6);

    echo $circulo->__get($nombre)."<br>";

    $circulo->__set($nombre,10);

    echo $circulo->__get($nombre)."<br>";

    /*echo $circulo->getRadio()."<br>";

    $circulo->setRadio(10);

    echo $circulo->getRadio()."<br>";*/

    ?>

</body>

</html>