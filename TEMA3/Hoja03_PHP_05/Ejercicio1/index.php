<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 Tema 3</title>
</head>

<body>
    <?php

    require_once("Empleado.class.php");
    require_once("Encargado.class.php");

    $empleado=new Empleado(100);

    echo "Sueldo del empleado: ".$empleado->getSueldo()." €</br>";

    $encargado=new Encargado(100);

    echo "Sueldo del encargado: ".$encargado->getSueldo()." €";

    ?>

</body>

</html>