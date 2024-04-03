<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 Tema 3</title>
</head>

<body>
    <?php

    require_once("Monedero.class.php");

    $m=new Monedero(40);

    echo "Monedero 1 -> ".$m."<br><br>";

    $m->meterDinero(100);

    echo "Monedero 1 -> ".$m."<br><br>";

    $m->sacarDinero(150);

    echo "Monedero 1 -> ".$m."<br><br>";
    

    echo Monedero::$numero_monederos." monedero(s)<br><br>";

    $m2=new Monedero(300);

    echo Monedero::$numero_monederos." monedero(s)<br><br>";

    echo "Monedero 2 -> ".$m2."<br><br>";

    $m2->__destruct();

    echo Monedero::$numero_monederos." monedero(s)<br><br>";

    ?>

</body>

</html>