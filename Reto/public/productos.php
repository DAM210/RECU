<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\PDOProducto;
use Reto\Clases\Produ;
use Reto\Clases\CestaCompra;

// Iniciar la sesión
session_start();

$cesta = CestaCompra::carga_cesta();

$produ = new Produ(new PDOProducto());
$productos = $produ->listarProductos();

/*echo '<pre>';
print_r($productos);
echo '</pre>';*/
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Tienda Productos</title>
</head>

<body>
    <?php

    if (isset($_POST['anadir'])) {
        $cesta->nuevoArticulo($_POST['idProducto']);
        $cesta->guardaCesta();
    }


    ?>
    <div class="container">
        <div class="cabecera">
            <h1>Listado de productos</h1>
            <?php
            $cesta->muestra();

            echo "<form action ='' method='post'>";
            if (isset($_SESSION['cesta'])) {
                
                echo '<p>' . count($cesta->getProductos()) . ' productos (' . $cesta->getCoste() . ' €)</p>';
            }else{
                echo '<p>Cesta de la compra</p>';
            }

            // Comprobar si el usuario está conectado
            if (isset($_SESSION['usuario'])) {
                // Botón Vaciar
                echo "<input type='submit' name='vaciar' id='vaciar' value='Vaciar' class='btn btn-primary' style='background-color: #8BC34A;'>";
                // Botón Comprar
                echo "<a href='cesta.php'> <button type='button' class='btn btn-primary' style='background-color: #8BC34A;'>Comprar</button></a>";
            } else {
                // Botón Vaciar desactivado
                echo "<input type='submit' name='vaciar' id='vaciar' value='Vaciar' class='btn btn-primary disabled' style='background-color: #8BC34A;' disabled>";
                // Botón Comprar desactivado
                echo "<a href='cesta.php'> <button type='button' class='btn btn-primary disabled' style='background-color: #8BC34A;' disabled>Comprar</button></a>";
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
        <div class="row">
            <?php foreach ($productos as $producto) : ?>
                <div class="col-md-4">
                    <div class="product">
                        <img src="<?php echo $producto->getImagen()->getRuta(); ?>" alt="<?php echo $producto->getImagen()->getNombre(); ?>" class="img-fluid">
                        <div>
                            <h4><?php echo $producto->getNombre(); ?></h4>
                            <p><?php echo substr($producto->getDescripcion(), 0, 150); ?> <?php if (strlen($producto->getDescripcion()) > 150) {
                                                                                                echo '... <a href="#">Leer más</a>';
                                                                                            } ?></p>

                            <p><?php echo $producto->getFamilia()->getNombre() ?></p>
                            <p>Precio: <?php echo $producto->getPrecio(); ?></p>

                            <form action='' method='post'>
                                <input type='hidden' name='idProducto' value='<?php echo $producto->getCodigo(); ?>'>
                                <input type='submit' name='anadir' value='Añadir a la cesta' class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>