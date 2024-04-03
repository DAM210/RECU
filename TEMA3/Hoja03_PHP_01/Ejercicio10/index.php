<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 10 Tema 3</title>
</head>

<body>
    <?php

        $num=13;
/*
        if ($num%2==0 || $num%3==0 || $num%5==0 || $num%$num==0) {
            echo "Es primo";
        }else{
            echo "NO es primo";
        
        }
*/
        if (esPrimo($num)) {
            echo "Es primo";
        }else{
            echo "NO es primo";
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
    }
    ?>

</body>

</html>