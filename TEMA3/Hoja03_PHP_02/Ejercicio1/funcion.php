<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 Tema 3</title>
</head>

<body>
    <?php

    function fecha(): string
    {
        setlocale(LC_ALL, 'es_ES', 'Spanish_Spain', 'Spanish');

        $imprimir = strftime("%A, %d de %B de %Y");
        return $imprimir;
    }

    ?>
</body>

</html>