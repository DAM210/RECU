<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\PDOProducto;
use Reto\Clases\Produ;
use Reto\Clases\CestaCompra;

if (!isset($_SESSION['usuario'])) {
    header('Location: ' . 'login.php');
}
if (isset($_SESSION['usuario'])) {
?>
    <a href='logoff.php'><button type='button'>Desconectar</button></a>
<?php
}

$cesta = new CestaCompra(new PDOProducto());
$cesta->carga_cesta();

$produ = new Produ(new PDOProducto());
$productos = $produ->listarProductos();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Tienda Productos</title>
</head>

<body>
    <?php

    if (isset($_POST['anadir'])) {
        $cesta->nuevoArticulo($_POST['idProducto']);
        $cesta->guardaCesta();
    }

    $cesta->muestra();

    if (isset($_SESSION['cesta'])) {
        echo "<form action ='' method='post'>";
        echo "<input type='submit' name='vaciar' id='vaciar' value='Vaciar'>";
        echo "<a href='cesta.php'> <button type='button'>Pagar</button></a>";
    }
    if (isset($_POST['vaciar'])) {
        unset($_SESSION['cesta']);
        header('Location:' . 'index.php');
    }
    ?>
    <div class="container">
        <div class="row">
            <?php foreach ($productos as $producto) : ?>
                <div class="col-md-4">
                    <div class="product">
                        <h4><?php echo $producto->getNombre(); ?></h4>
                        <p><?php echo $producto->getDescripcion(); ?></p>
                        <p><?php echo $producto->getFamilia()->getNombre(); ?></p>
                        <p>Precio: <?php echo $producto->getPrecio(); ?></p>
                        <img src="<?php echo $producto->getImagen()->getRuta(); ?>" alt="<?php echo $producto->getImagen()->getNombre(); ?>" class="img-fluid">
                        <form action='' method='post'>
                            <input type='hidden' name='idProducto' value='<?php echo $producto->getCodigo(); ?>'>
                            <input type='submit' name='anadir' value='Añadir a la cesta' class="btn btn-primary">
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>