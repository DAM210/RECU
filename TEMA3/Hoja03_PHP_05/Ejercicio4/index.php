<?php

require_once("Clases/Producto.php");
require_once("Clases/Alimentacion.php");
require_once("Clases/Electronica.php");

use Ejercicio4_2\Clases\Alimentacion;
use Ejercicio4_2\Clases\Electronica;

// Crear productos
$producto1 = new Alimentacion("A001", "Leche", 0.89, 2, 2024);
$producto2 = new Alimentacion("A002", "Pan", 1.20, 3, 2024);
$producto3 = new Electronica("E001", "Teléfono", 300, 24);
$producto4 = new Electronica("E002", "Ordenador", 800, 36);

// Crear array de productos
$productos = [$producto1, $producto2, $producto3, $producto4];

// Mostrar productos y calcular importe total
$total = 0;
$importeAlimentacion = 0;
$importeElectronica = 0;

//recorre el array de productos, muestra los datos de cada uno y suma el precio de cada producto al total
foreach ($productos as $producto) {
    $producto->mostrar();
    $total += $producto->getPrecio();

    //dependiendo de si es Alimentacion o Electronica lo suma a su correspendiente importe
    if ($producto instanceof Alimentacion) {
        $importeAlimentacion += $producto->getPrecio();
    } elseif ($producto instanceof Electronica) {
        $importeElectronica += $producto->getPrecio();
    }
}

echo "Importe total: " . $total . "€<br>";
echo "Se ha gastado más en ";
//si el importe de la alimentacion es mayor, menor o igual que el de la electronica
if ($importeAlimentacion > $importeElectronica) {
    echo "alimentación.";
} elseif ($importeElectronica > $importeAlimentacion) {
    echo "electrónica.";
} else {
    echo "ambos tipos de productos.";
}

?>