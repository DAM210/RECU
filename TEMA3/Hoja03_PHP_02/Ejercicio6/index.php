<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
</head>

<body>
    <?php

    $fecha = date('d-m-Y');

    function validarFecha($fecha)
    {
        $datos = explode('-', $fecha);
        if (count($datos) == 3 && checkdate($datos[1], $datos[0], $datos[2])) {
            return true;
        }
        return false;
    }

    if (validarFecha('21-09-2023')) {
        echo "La fecha es correcta";
    } else {
        echo "La fecha NO es correcta";
    }

    ?>
</body>

</html>