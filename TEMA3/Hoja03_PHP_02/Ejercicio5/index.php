<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 Tema 3</title>
</head>

<body>
    <?php

    $num = 121;
    $decimal = 2.6;

    function capicua($i)
    {

        $invertido = 0;
        $cociente = $i;
        while ($cociente != 0) {
            $resto = $cociente % 10;
            $invertido = $invertido * 10 + $resto;
            $cociente = (int)($cociente / 10);
        }
        if ($i == $invertido)
            print "El número $i es capicúa";
        else
            print "El número $i NO es capicúa";
    }

    function redondeo($num)
    {
        return round($num);
    }

    function numDigitos($num)
    {
        return mb_strlen($num);
    }

    echo capicua($num) . "<br>";
    echo "$decimal redondeado es " . redondeo($decimal) . "<br>";
    echo "El número de digitos es " . numDigitos($num) . "<br>";

    ?>

</body>

</html>