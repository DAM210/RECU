<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 Tema 3</title>
</head>

<body>
    <?php

    $n = 70069335;

    function calcularLetra($n)
    {
        $resto = $n % 23;
        $letra = 'TRWAGMYFPDXBNJZSQVHLCKE';
        return $letra[$resto];
    }

    echo $n . calcularLetra($n);

    ?>

</body>

</html>