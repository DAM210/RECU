<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9 Tema 3</title>
</head>

<body>
    <?php

    $dias = 5;
    $km = 400;
    $precio = $km*2.5;

    if (($km > 800) && ($dias > 7)) {
        $precio *= 0.7;
    }
    
    echo "El precio es $precio";

    ?>

</body>

</html>