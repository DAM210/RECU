<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 Tema 3</title>
</head>

<body>
    <?php
    $suma = 0;
    for ($i = 10; $i <= 100; $i++) {
        if ($i % 2 == 0)
            $suma+=$i;
            
    }

    echo "Suma de números pares de 10 a 100: ".$suma;

    ?>
</body>

</html>