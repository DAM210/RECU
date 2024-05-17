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
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/estilo.css">
        <title>Detalle del producto</title>
    </head>

    <body>
    <?php
    // Verificar si se encontró el producto
    if ($producto) {
        // Mostrar la información del producto
        echo "<h1>Detalles del Producto</h1>";
        //echo "<p><strong>Código:</strong> " . $producto->getCodigo() . "</p>";
        echo "<p><strong>Nombre:</strong> " . $producto->getNombre() . "</p>";
        echo "<p><strong>Precio:</strong> " . $producto->getPrecio() . "</p>";
        echo "<p><strong>Descripción:</strong> " . $producto->getDescripcion() . "</p>";
        echo "<p><strong>Familia:</strong> " . $producto->getFamilia()->getNombre() . "</p>";
        echo "<p><img src=\"" . $producto->getImagen()->getRuta() . "\" alt=\"" . $producto->getImagen()->getNombre() . "\" width=\"250\" height=\"300\"></p>";
        echo "<a href='index.php'><button class='btn'>Volver al listado</button></a>";
    } else {
        echo "<p>El producto con el ID $idProducto no fue encontrado.</p>";
    }
} else {
    echo "<p>No se proporcionó un ID válido.</p>";
}
    ?>
    </body>

    </html>