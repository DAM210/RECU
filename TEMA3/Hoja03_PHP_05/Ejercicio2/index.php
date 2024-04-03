<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 Tema 3</title>
</head>

<body>
    <?php

    require_once("Cuenta.class.php");
    require_once("CuentaCorriente.class.php");
    require_once("CuentaAhorro.class.php");

    // Crear objetos y probar los métodos
    $cuentaCorriente = new CuentaCorriente('123456', 'Juan Perez', 100, 5);
    $cuentaAhorro = new CuentaAhorro('789012', 'Maria Gomez', 200, 10, 2);

    // Realizar operaciones
    $cuentaCorriente->ingreso(50);
    $cuentaCorriente->reintegro(30);
    $cuentaAhorro->ingreso(100);
    $cuentaAhorro->aplicaInteres();

    // Mostrar información
    echo "<h2>Cuenta Corriente:</h2>";
    echo $cuentaCorriente->mostrar();
    echo "<h2>Cuenta Ahorro:</h2>";
    echo $cuentaAhorro->mostrar();
    ?>

</body>

</html>