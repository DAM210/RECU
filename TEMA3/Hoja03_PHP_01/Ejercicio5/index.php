<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 Tema 3</title>
</head>

<body>
    <?php

    $num = 123;

    $numeros = str_split($num);

    $suma = 0;
    $multi = 1;
    for ($i = 0; $i < count($numeros); $i++) {
        $suma += $numeros[$i];
        $multi *= $numeros[$i];
    }

    if ($suma == $multi) {
        echo "Coinciden";
    } else {
        echo "NO coinciden";
    }

    ?>

</body>

</html>