<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\CestaCompra;
use Reto\Clases\PDOProducto;

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ' . 'login.php');
}/*
if (isset($_SESSION['usuario'])) {
    echo "<a href='productos.php'> <button type='button' class='btn' style='background-color: orange;'>Desconectar</button></a>";
}*/
$cesta = new CestaCompra(new PDOProducto());
$cesta = $cesta->carga_cesta();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Pagar</title>
</head>

<body>
<div class="cabecera">
            <h1>Cesta de la compra</h1>
            <?php
            $cesta->muestra();

            if (isset($_SESSION['cesta'])) {
                echo "<form action ='' method='post'>";
                echo '<p>' . count($cesta->getProductos()) . ' productos (' .$cesta->getCoste(). ' €)</p>';
                echo "<input type='submit' name='vaciar' id='vaciar' value='Vaciar' class='btn btn-primary' style='background-color: green;'>";
                echo "<a href='cesta.php'> <button type='button' class='btn btn-primary' style='background-color: green;'>Comprar</button></a>";
                
            }

            if (isset($_SESSION['usuario'])) {
                echo "<a href='logoff.php'> <button type='button' class='btn' style='background-color: orange;'> Desconectar usuario " . $_SESSION['usuario']['nombre'] . "</button></a>";
            }

            if (isset($_POST['vaciar'])) {
                unset($_SESSION['cesta']);
                header('Location:' . 'productos.php');
            }
            ?>
        </div>
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
    <a href='productos.php'> <button type='button' class="btn">Seguir comprando</button></a>
    <a href='pagar.php'> <button type='button'class="btn">Realizar compra</button></a>
</body>

</html>