<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\CestaCompra;
use Reto\Clases\PDOProducto;
session_start();
$cesta=new CestaCompra(new PDOProducto());
$cesta = CestaCompra::carga_cesta();
$total=$cesta->getCoste();

if (isset($_SESSION['cesta'])) {
unset($_SESSION['cesta']);
}

echo"Se ha realizado una compra con importe de ".$total." €";
echo"<a href='productos.php'> <button type='button'>Realizar otra compra</button></a>";
?>