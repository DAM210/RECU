<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 8 Tema 3</title>
</head>

<body>
    <?php

    $numero = 4;
    $factorial = 1;
    for ($i = 1; $i <= $numero; $i++) {
        $factorial = $factorial * $i;
    }

    echo $factorial;
    ?>

</body>

</html>