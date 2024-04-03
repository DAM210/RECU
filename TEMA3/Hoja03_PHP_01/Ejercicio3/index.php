<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 Tema 3</title>
</head>

<body>
    <?php

    $num = 121;
    $invertido = 0;
    $cociente = $num;
    while ($cociente != 0) {
        $resto = $cociente % 10;
        $invertido = $invertido * 10 + $resto;
        $cociente = (int)($cociente / 10);
    }
    if ($num == $invertido)
        print "El número $num es capicúa</br>";
    else
        print "El número $num NO es capicúa</br>";
    ?>

</body>

</html>