<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 Tema 3</title>
</head>

<body>
    <?php

    $capital=10000;
    $redito=10;
    $tiempo=300;
    function interesSimple($capital,$redito,$tiempo){
        $capitalFinal=0;
        return $capitalFinal=$capital*(1+$redito*$tiempo);
    }

    function interesCompuesto($capital,$redito,$tiempo){
        $capitalFinal=0;
        //return $capitalFinal=$capital*(pow(1+$redito),($tiempo/365));
    }

    ?>

</body>

</html>