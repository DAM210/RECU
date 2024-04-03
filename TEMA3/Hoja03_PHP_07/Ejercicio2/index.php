<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 Tema 3</title>
</head>

<body>
    <?php

    require_once("Empleado.class.php");
    include("Personal.trait.php");
    include("Laboral.trait.php");
    include("Mensaje.trait.php");

    $empleado=new Empleado("Paco",50,"direccion","123ABC",1200);

    //echo $empleado->infoP()."</br>";
    //echo $empleado->infoL()."</br>";

    ?>

</body>

</html>