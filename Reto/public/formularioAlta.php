<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\BaseDatos;

use function Reto\Funciones\{
    validarRequerido,
    validarNumerico,
    validarFormatoImagen,
    validarSubidaFichero,
    moverFicheroSubido,
    limpiarTexto,
    limpiarEntrada,
    redireccionar
};
use Reto\Clases\Producto;
use Reto\Clases\PDOProducto;
use Reto\Clases\Produ;
use Reto\Clases\Imagen;
use Reto\Clases\Familia;

$conexion = BaseDatos::getConexion();

try {
    $queryFamilias = $conexion->query("SELECT id, nombre FROM familias");
    $familias = $queryFamilias->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En lugar de redireccionar, puedes mostrar un mensaje de error en la misma página
    echo "Error al obtener las familias: " . $e->getMessage();
    exit(); // Salir del script después de mostrar el mensaje de error
}

// Gestión de error por redirección GET
if (isset($_GET['error'])) {
    $error = $_GET['error'];

    $mensajeAviso = match ($error) {
        "1" => "Por favor, rellena todos los campos.",
        "2" => "No se puede procesar el archivo.",
        "3" => "El archivo no tiene una extensión válida.",
        "5" => "No se ha podido guardar el grupo en base de datos.",
        default => null
    };

    if (!is_null($mensajeAviso)) echo "<p>$mensajeAviso</p>";
}

// Gestión de success por redirección GET
if (isset($_GET['success'])) {
    $success = $_GET['success'];

    $mensajeAviso = match ($success) {
        "1" => "El grupo ha sido dado de alta correctamente.",
        default => null
    };

    if (!is_null($mensajeAviso)) echo "<p>$mensajeAviso</p>";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
</head>

<body>
    <h1>Crear Nuevo Producto</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>
        </div>
        <div>
            <label for="familia">Familia:</label>
            <select id="familia" name="familia" required>
                <?php foreach ($familias as $familia) : ?>
                    <option value="<?php echo $familia['id']; ?>"><?php echo $familia['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required>
        </div>
        <button type="submit" name="crear">Crear Producto</button>
    </form>

    <?php
    // Verificar si se han enviado los datos del formulario
    if (isset($_POST['crear'])) {
        // Validar los campos del formulario
        $nombre = limpiarTexto($_POST['nombre']);
        $descripcion = limpiarTexto($_POST['descripcion']);
        $precio = $_POST['precio'];
        $idFamilia = $_POST['familia'];
        $imagen = $_FILES['imagen'];

        if (!validarRequerido($nombre) || !validarRequerido($descripcion) || !validarNumerico($precio) || !validarFormatoImagen($imagen['type'])) {
            // Manejar el error, por ejemplo, redirigir de nuevo al formulario con un mensaje de error
            redireccionar('index.php?error=1');
            exit();
        }
        // Obtener el nombre de la familia utilizando su ID
        $nombreFamilia = null;
        try {
            $queryObtenerNombre = $conexion->prepare('SELECT nombre FROM familias WHERE id = :id');
            $queryObtenerNombre->bindParam(':id', $idFamilia, PDO::PARAM_INT);
            $queryObtenerNombre->execute();

            if ($queryObtenerNombre->rowCount() > 0) {
                $nombreFamilia = $queryObtenerNombre->fetchColumn();
            }
        } catch (PDOException $e) {
            // Manejar el error de consulta
            redireccionar('index.php?error=2');
            exit();
        }

        if ($nombreFamilia === null) {
            // Manejar el caso en que no se encuentre la familia
            redireccionar('index.php?error=3');
            exit();
        }

        // Validar la subida de la imagen
        if (validarSubidaFichero($_FILES)) {
            // Asignar un ID único al nombre de la imagen y sustituir espacios por '_' si los tuviese
            $_FILES['imagen']['name'] = str_replace(' ', '_', uniqid() . '-' . $_FILES['imagen']['name']);

            if (moverFicheroSubido($imagen)) {
                limpiarEntrada();

                $familia = new Familia($idFamilia, $nombreFamilia);
                // Creación de la imagen en base de datos
                $img = new Imagen(null, $_FILES['imagen']['name'], '/img/' . $_FILES['imagen']['name']);

                if ((new Produ(new PDOProducto()))->crearProducto(new Producto(null, $precio, $nombre, $descripcion, $familia, $img))) {
                    redireccionar('index.php?success=1'); // El producto ha sido dado de alta correctamente
                } else {
                    unlink(dirname(__DIR__) . '/public/img/' . $_FILES['fichero']['name']);
                    redireccionar('index.php?error=4'); // No se ha podido guardar el producto en base de datos
                }
            } else {
                // Manejar el error si no se pudo crear el producto en la base de datos
                redireccionar('index.php?error=2');
                exit();
            }
        }
    }

    ?>
</body>

</html>