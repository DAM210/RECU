<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

include __DIR__ . '/../src/Funciones/funciones.php';
use function Reto\Funciones\{getFamilia};
use Reto\Clases\Producto;
use Reto\Clases\Produ;
use Reto\Clases\Imagen;
use Reto\Clases\PDOProducto;


if (isset($_POST['crear'])) {
    
    // Validar que los campos no estén vacíos
    if (!validarRequerido($_FILES['imagen']['name'])) {
        redireccionar('formularioAlta.php?error=1');
    }

    foreach ($_POST as $clave => $valor) {
        if ($clave !== 'imagen' && $clave !== 'crear' && !validarRequerido($valor)) {
            redireccionar('formularioAlta.php?error=1');
        }
    }
      
    // Validar el precio
    if (!validarNumerico($_POST['precio'])) redireccionar('formularioAlta.php?error=4');

    // Validar formatos de imagen
    if (!validarFormatoImagen($_FILES['imagen']['type'])) {
        redireccionar('formularioAlta.php?error=3');
    }
    

    // Validar la subida de la imagen
    if (validarSubidaFichero($_FILES['imagen'])) {
        // Asignar un ID único al nombre de la imagen y sustituir espacios por '_' si los tuviese
        //$_FILES['imagen']['name'] = str_replace(' ', '_', uniqid() . '-' . $_FILES['imagen']['name']);

        limpiarEntrada();
        $imagenNombre=$_FILES['imagen']['name'];
        $imagenNombre=uniqid().'_'.$imagenNombre;
        // Mover el fichero imagen a la ubicación img
        if (moverFicheroSubido($_FILES['imagen'])) {

            // Crear el producto en la base de datos
            $imagen = new Imagen($_FILES['imagen']['name'], 'img/' . $_FILES['imagen']['name']); //necesario nombre y ruta
            $familia=getFamilia($_POST['familia_id']);

            echo $imagen->getNombre().' '.$imagen->getRuta();
            echo $familia->getId().' '.$familia->getNombre();
            if ((new Produ(new PDOProducto()))->crearProducto(new Producto($_POST['precio'], $_POST['nombre'], $_POST['descripcion'], $familia, $imagen))) {
                redireccionar('formularioAlta.php?success=1'); // El producto ha sido dado de alta correctamente

            } else {
                unlink(__DIR__ . '/public/img/' . $imagenNombre);
                //sredireccionar('formularioAlta.php?error=5'); // No se ha podido guardar el producto en base de datos
            }
        } else {
            redireccionar('formularioAlta.php?error=2'); // No se puede procesar el archivo
        }
    } else {
        redireccionar('formularioAlta.php?error=2'); // No se puede procesar el archivo
    }

}
?>

