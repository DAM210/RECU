<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\PDOProducto;
use Reto\Clases\Produ;

// Verificar si se ha recibido un ID válido por GET
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $idProducto = $_POST['id'];

    // Crear una instancia de la clase Produ con el repositorio PDOProducto
    $produ = new Produ(new PDOProducto());

    // Obtener el producto por su ID
    $producto = $produ->listarPorIdProducto($idProducto);

    // Verificar si se encontró el producto
    if ($producto) {
        // Mostrar la información del producto
        echo "<h1>Detalles del Producto</h1>";
        echo "<p><strong>Código:</strong> " . $producto->getCodigo() . "</p>";
        echo "<p><strong>Nombre:</strong> " . $producto->getNombre() . "</p>";
        echo "<p><strong>Precio:</strong> $" . $producto->getPrecio() . "</p>";
        echo "<p><strong>Descripción:</strong> " . $producto->getDescripcion() . "</p>";
        echo "<p><strong>Familia:</strong> " . $producto->getFamilia()->getNombre() . "</p>";
        echo "<p><img src=\"" . $producto->getImagen()->getRuta() . "\" alt=\"" . $producto->getImagen()->getNombre() . "\" width=\"250\" height=\"300\"></p>";


    } else {
        echo "<p>El producto con el ID $idProducto no fue encontrado.</p>";
    }
} else {
    echo "<p>No se proporcionó un ID válido.</p>";
}
?>
