<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 Tema 3</title>
</head>

<body>
    <?php

    // Cargar un array con 20 números aleatorios ordenados de menor a mayor
    function cargar()
    {
        for ($i = 0; $i < 20; $i++) {
            $array[] = rand(1, 100); // Genera números aleatorios entre 1 y 100
        }
        return $array;
    }

    // Cargar dos arrays con 20 números cada uno
    $array1 = cargar();
    $array2 = cargar();


    // Fusionar dos arrays ordenados en uno nuevo
    function mezclar($array1, $array2)
    {
        $mezcla = array_merge($array1, $array2);

        sort($mezcla);
        return $mezcla;
    }

    print_r($array1);
    echo "<br><br>";

    print_r($array2);
    echo "<br><br>";

    // Fusionar los arrays y mostrar el resultado
    $mezcla = mezclar($array1, $array2);
    echo "Array Fusionado: ";
    print_r($mezcla);


    ?>

</body>

</html>