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
    <link rel="stylesheet" href="css/estilo.css">
    <title>Listado de Productos</title>
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
                    <td class="tdIndex"><?php echo $producto->getCodigo(); ?></td>
                    <td class="tdIndex"><?php echo $producto->getNombre(); ?></td>
                    <td class="tdIndex"><?php echo $producto->getPrecio(); ?></td>
                    <td class="tdIndex">
                        <form action="detalle.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $producto->getCodigo(); ?>">
                            <button type="submit" class="btn">Más información</button>
                        </form>
                        <form action="borrar.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $producto->getCodigo(); ?>">
                            <button type="submit" class="btn">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Enlace para crear un nuevo producto -->
    <div class="center-button"><a href="formularioAlta.php"><button class="btn">Crear Nuevo Producto</button></a></div>
</body>

</html>