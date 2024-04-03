<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6 Tema 3</title>
</head>

<body>
    <?php

    //OPCION 1
    $v1 = 0;
    $v2 = 1;

    //Mostramos el primer número de la serie de Fibonacci
    echo $v1 . '<br>';

    //Realizamos 15 sucesiones de la secuencia
    for ($i = 0; $i < 15; $i++) {

        $extra = $v1;
        $v1 = $v2;

        $v2 = $extra + $v1;


        echo $v1 . '<br>';
    }


    //OPCION 2

    $v1 = 0;
    $v2 = 1;

    //Realizamos 15 sucesiones de la secuencia
    for ($i = 0; $i < 15; $i++) {

        echo "$v1 $v2 ";

        $v1 += $v2;
        $v2 += $v1;
    }
    ?>

</body>

</html>