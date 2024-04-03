<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 8 Tema 3</title>
</head>

<body>
    <?php

    $cadena = "Comer algas es realmente sano";

    function buscar($cadena)
    {
        return strpos($cadena, "algas");
    }

    function reemplazar($cadena)
    {
        echo str_replace("realmente", "muy", $cadena) . "<br>";
    }

    function existe($cadena)
    {

        if (strpos($cadena, "anacardo") != false) {
            echo "anacardo se encuentra dentro de la cadena <br>";
        } else {
            echo "anacardo no existe en la cadena <br>";
        }
    }

    function invertir($cadena)
    {
        echo strrev($cadena) . "<br>";
    }

    function cantE($cadena)
    {
        echo "La letra e aparece " . substr_count($cadena, 'e') . " veces <br>";
    }

    echo "algas esta en la posicion " . buscar($cadena) . "<br>";

    reemplazar($cadena);

    existe($cadena);

    invertir($cadena);

    cantE($cadena);
    ?>
</body>

</html>