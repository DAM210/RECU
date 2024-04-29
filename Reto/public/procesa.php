<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use function Reto\Funciones\{
    validarRequerido,
    validarNumerico,
    validarFormatoImagen,
    validarSubidaFichero,
    moverFicheroSubido,
    limpiarEntrada,
    redireccionar
};

use Reto\Clases\Familia;
use Reto\Clases\Producto;
use Reto\Clases\Produ;
use Reto\Clases\Imagen;
use Reto\Clases\PDOProducto;

if (isset($_POST['enviar'])) {
    // Validar que los campos no estén vacíos
    if (!validarRequerido($_FILES['fichero']['name'])) redireccionar('index.php?error=1');

    foreach ($_POST as $clave => $valor) {
        if (!validarRequerido($valor)) redireccionar('index.php?error=1');
    }

    // Validar el precio
    if (!validarNumerico($_POST['precio'])) redireccionar('index.php?error=4');

    // Validar formatos de imagen
    if (!validarFormatoImagen($_FILES['fichero']['type'])) redireccionar('index.php?error=3');

    // Validar la subida de la imagen
    if (validarSubidaFichero($_FILES)) {
        // Asignar un ID único al nombre de la imagen y sustituir espacios por '_' si los tuviese
        $_FILES['fichero']['name'] = str_replace(' ', '_', uniqid() . '-' . $_FILES['fichero']['name']);

        // Mover el fichero imagen a la ubicación img
        if (moverFicheroSubido($_FILES)) {
            limpiarEntrada();

            // Antes de crear el objeto Producto, asegurémonos de que $precio sea un float
            $precio = str_replace(',', '.', $_POST['precio']);
            $precio = floatval($precio);

            // Crear el producto en la base de datos
            $imagen = new Imagen($_POST['imagen_id'], $_FILES['fichero']['name'], '/img/' . $_FILES['fichero']['name']);
            $familia = new Familia($_POST['familia_id'], $_POST['nombre']);

            if ((new Produ(new PDOProducto()))->crearProducto(new Producto(null, $precio, $_POST['nombre'], $_POST['descripcion'], $familia, $imagen))) {
                redireccionar('index.php?success=1'); // El producto ha sido dado de alta correctamente
            } else {
                unlink(__DIR__ . '/public/img/' . $_FILES['fichero']['name']);
                redireccionar('index.php?error=5'); // No se ha podido guardar el producto en base de datos
            }
        } else {
            redireccionar('index.php?error=2'); // No se puede procesar el archivo
        }
    } else {
        redireccionar('index.php?error=2'); // No se puede procesar el archivo
    }
}
?>
