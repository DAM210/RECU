<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 Tema 3</title>
</head>

<body>
    <?php

    $articulo = array(
        "codigo" => "12345",
        "descripcion" => "Producto de ejemplo",
        "existencias" => 50
    );

    function mayor($articulo)
    {
        $mayorExistencias = 0;
        $nombreMayor = '';

        for ($i = 0; $i < count($articulo); $i++) {
            if ($articulo['existencias'] > $mayorExistencias) {
                $mayorExistencias = $articulo['existencias'];
                $nombreMayor = $articulo['descripcion'];
            }
        }

        return $nombreMayor;
    }

    function sumar($articulo)
    {
        $sumaExistencias = 0;

        for ($i = 0; $i < count($articulo); $i++) {
            $sumaExistencias += $articulo['existencias'];
        }


        return $sumaExistencias;
    }

    function mostrar($articulo)
    {
        echo "Código: " . $articulo['codigo'] . "<br>";
        echo "Descripción: " . $articulo['descripcion'] . "<br>";
        echo "Existencias: " . $articulo['existencias'] . "<br>";
        echo "\n";
    }

    echo "El artículo con más existencias es: " . mayor($articulo) . "<br>";
    echo "La suma total de existencias es: " . sumar($articulo) . "<br>";

    echo "Información de los artículos:<br>";
    mostrar($articulo);

    ?>

</body>

</html>