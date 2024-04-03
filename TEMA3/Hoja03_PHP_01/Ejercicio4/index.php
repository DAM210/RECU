<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 Tema 3</title>
</head>

<body>
    <?php

    for ($i = 100; $i <= 999; $i++) {
        $invertido = 0;
        $cociente = $i;
        while ($cociente != 0) {
            $resto = $cociente % 10;
            $invertido = $invertido * 10 + $resto;
            $cociente = (int)($cociente / 10);
        }
        if ($i == $invertido)
            print "El número $i es capicúa</br>";
    }
    ?>

</body>

</html>