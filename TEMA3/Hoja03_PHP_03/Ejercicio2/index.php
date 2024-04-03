<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 Tema 3</title>
</head>

<body>
    <?php

    $cantidad = 888;

    function desglosar($cantidad)
    {
        $valores = array(500,200,100,50,20,10,5,2,1);

        // Inicializamos un array para almacenar el desglose
        $desglose = array();

        // Iteramos a través de los valores y calculamos el desglose
        foreach ($valores as $valor) {

            if ($cantidad >= $valor) {

                $cantidadDinero = intval($cantidad / $valor);
                $desglose[$valor] = $cantidadDinero;

                $cantidad -= $cantidadDinero * $valor;
            }
        }

        // Imprimimos el desglose
        echo "Mejor desglose de monedas y billetes:<br>";
        foreach ($desglose as $valor => $cantidadDinero) {
            echo "$cantidadDinero de $valor<br>";
        }
    }

    desglosar($cantidad);


    ?>

</body>

</html>