<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 Tema 3</title>
</head>
<body>
    <?php

    //idioma español
    //setlocale(LC_TIME, 'es_ES.UTF-8','esp');
    setlocale(LC_ALL, 'es_ES','Spanish_Spain','Spanish');
    //formato
    echo strftime("%A, %d de %B de %Y");

    ?>
</body>
</html>