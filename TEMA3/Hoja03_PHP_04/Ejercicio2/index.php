<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 Tema 3</title>
</head>

<body>
    <?php

    require_once("Coche.class.php");

    $coche=new Coche("1234ABC",40);

    echo $coche->__toString()."<br><br>ACELERA -> ";

    $coche->acelera(100);

    echo $coche->__toString()."<br><br>FRENA -> ";

    $coche->frena(130);

    echo $coche->__toString();

    ?>

</body>

</html>