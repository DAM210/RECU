<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 Tema 3</title>
</head>

<body>
    <?php

    require_once("Funciones/Turno.enum.php");
    require_once("Clases/Medico.class.php");
    require_once("Clases/Familia.class.php");
    require_once("Clases/Urgencia.class.php");
    include 'Funciones/funciones.php';

    use Ejercicio3_2\Clases\Familia;
    use Ejercicio3_2\Clases\Urgencia;
    use Ejercicio3_2\Funciones\Turno;
    use function Ejercicio3_2\Funciones\mayoresDe60Anios;

    $mFamilia1 = new Familia("Roberto", 58, Turno::MAÑANA, 12);
    $mFamilia2 = new Familia("Beatriz", 26, Turno::MAÑANA, 15);
    $mFamilia3 = new Familia("Jorge", 34, Turno::TARDE, 10);

    $mUrgencia1 = new Urgencia("Francisco", 70, Turno::TARDE, "Traumatología");
    $mUrgencia2 = new Urgencia("Lorena", 51, Turno::MAÑANA, "Dermatología");
    $mUrgencia3 = new Urgencia("Sara", 64, Turno::TARDE, "Cardiología");

    $objetos = [$mFamilia1, $mFamilia2, $mFamilia3, $mUrgencia1, $mUrgencia2, $mUrgencia3];

    for ($i = 0; $i < count($objetos); $i++) {
        echo $objetos[$i] . "</br>";
    }
    echo mayoresDe60Anios($objetos, 0) . " médicos hay mayores de 60 años en urgencias de tarde.";

    ?>

</body>

</html>