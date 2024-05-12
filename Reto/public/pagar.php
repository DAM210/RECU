<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\CestaCompra;
use Reto\Clases\PDOProducto;

$cesta=new CestaCompra(new PDOProducto());
$cesta->carga_cesta();
$total=$cesta->getCoste();

if (isset($_SESSION['cesta'])) {
unset($_SESSION['cesta']);
}

echo"Se ha realizado una compra con importe de ".$total." €";
echo"<a href='index.php'> <button type='button'>Realizar otra compra</button></a>";
?>