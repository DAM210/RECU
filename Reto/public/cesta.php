<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\CestaCompra;
use Reto\Clases\PDOProducto;

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ' . 'login.php');
}
if (isset($_SESSION['usuario'])) {
    echo "<a href='productos.php'> <button type='button'>Desconectar</button></a>";
}
$cesta = new CestaCompra(new PDOProducto());
$cesta = $cesta->carga_cesta();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Pagar</title>
</head>

<body>
    <table class="table table-primary table-hover">
        <?php

        foreach ($cesta->getProductos() as $productos => $producto) {
            echo "<tr>";
            echo "<td><img src=\"" . $producto->getImagen()->getRuta() . "\" alt=\"" . $producto->getImagen()->getNombre() . "\" width=\"250\" height=\"300\">";
            echo $producto->getNombre();
            echo $producto->getPrecio() . "</td>";
            echo "</tr>";
        ?>
        <?php
        }
        echo "";
        ?>
    </table>
    <a href='productos.php'> <button type='button'>Seguir comprando</button></a>
    <a href='pagar.php'> <button type='button'>Realizar compra</button></a>
</body>

</html>