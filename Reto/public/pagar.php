<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\CestaCompra;
use Reto\Clases\PDOProducto;

session_start();
$cesta = new CestaCompra(new PDOProducto());
$cesta = CestaCompra::carga_cesta();
$total = $cesta->getCoste();

if (isset($_SESSION['cesta'])) {
    unset($_SESSION['cesta']);
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Gracias por su compra</title>
</head>

<body>
    <?php
    echo "<p class='compra'>Se ha realizado una compra con importe de " . $total . " €</p>";
    echo "<a href='productos.php'><button type='button' class='btn'>Realizar otra compra</button></a>";
    ?>
</body>

</html>