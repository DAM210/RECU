<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar</title>
</head>

<body>
    <?php
    require_once dirname(__DIR__) . '/vendor/autoload.php';

    use Reto\Clases\Produ;
    use Reto\Clases\PDOProducto;
    use function Reto\Funciones\redireccionar;

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Recogemos el producto
        $producto = ((new Produ(new PDOProducto()))->listarPorIdProducto($_POST['id']));

        // Si se ha recogido correctamente lo eliminamos junto a su imagen almacenada
        if (!is_null($producto)) {
            if ((new Produ(new PDOProducto()))->borrarProducto($producto->getCodigo())) {
                unlink('.' . $grupo->getImagen()->getUrl());
                redireccionar('index.php?success=1'); // Producto e imagen borrados
            } else {
                redireccionar('index.php?error=3'); // No se ha podido borrar el producto
            }
        } else {
            redireccionar('index.php?error=2'); // No se encuentra el id de producto
        }
    } else {
        redireccionar('index.php?error=1'); // ID no definido
    }
    ?>
</body>

</html>