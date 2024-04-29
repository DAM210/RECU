<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\PDOProducto;
use Reto\Clases\Produ;

// Crear una instancia de la clase Produ con el repositorio PDOProducto
$produ = new Produ(new PDOProducto());

// Obtener el listado de productos
$productos = $produ->listarProductos();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Listado de Productos</h1>

    <!-- Mostrar el listado de productos en una tabla -->
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) : ?>
                <tr>
                    <td><?php echo $producto->getCodigo(); ?></td>
                    <td><?php echo $producto->getNombre(); ?></td>
                    <td><?php echo $producto->getPrecio(); ?></td>
                    <td>
                        <a href="ver_producto.php?id=<?php echo $producto->getCodigo(); ?>">Ver</a> |
                        <a href="borrar_producto.php?id=<?php echo $producto->getCodigo(); ?>">Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Enlace para crear un nuevo producto -->
    <a href="crear_producto.php">Crear Nuevo Producto</a>
</body>

</html>
