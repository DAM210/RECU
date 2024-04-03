<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 12 Tema 3</title>
</head>

<body>
    <?php

    /*for ($i = 3; $i <= 999; $i++) {
        if (esPrimo($i)) {
            echo $i."</br>";
        }
    }

    function esPrimo($num)
    {
        if (!is_numeric($num))
            //Comprobamos si es un número válido 
            return false;

        for ($i = 2; $i < $num; $i++) {

            if (($num % $i) == 0) {

                // No es primo
                return false;
            }
        }

        // Es primo
        return true;
    }*/

    for ($i = 3; $i <= 999; $i++) {
        $numeroPrimo = $i;
        $divisores = 0;

        for ($j = 2; $j <= $numeroPrimo; $j++) {
            if (($numeroPrimo % $j) == 0) {

                $divisor = $j;
                $divisores++;
            }
        }

        if ($divisores <= 1) {
            echo "$numeroPrimo<br>";
        }
    }


    ?>

</body>

</html>