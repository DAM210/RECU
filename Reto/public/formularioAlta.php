<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\BaseDatos;

include __DIR__ . '/../src/Funciones/funciones.php';
use function Reto\Funciones\{getFamilias};

$conexion = BaseDatos::getConexion();

$familias=getFamilias();

// Gestión de error por redirección GET
if (isset($_GET['error'])) {
    $error = $_GET['error'];

    $mensajeAviso = match ($error) {
        "1" => "Por favor, rellena todos los campos.",
        "2" => "No se puede procesar el archivo.",
        "3" => "El archivo no tiene una extensión válida.",
        "4" => "Por favor, introduce un precio válido.",
        "5" => "No se ha podido guardar el producto en base de datos.",
        default => null
    };

    if (!is_null($mensajeAviso)) echo "<p class='error-message'>$mensajeAviso</p>";
}

// Gestión de success por redirección GET
if (isset($_GET['success'])) {
    $success = $_GET['success'];

    $mensajeAviso = match ($success) {
        "1" => "El producto ha sido dado de alta correctamente.",
        default => null
    };

    if (!is_null($mensajeAviso)) echo "<p class='success-message'>$mensajeAviso</p>";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Crear Producto</title>
</head>

<body>
    <h1>Crear Nuevo Producto</h1>
    <form action="procesa.php" method="POST" enctype="multipart/form-data">
        <div>
            <input placeholder="Nombre" type="text" id="nombre" name="nombre">
        </div>
        <div>
            <textarea placeholder="Descripcion" id="descripcion" name="descripcion"></textarea>
        </div>
        <div>
            <input placeholder="Precio" type="text" id="precio" name="precio">
        </div>
        <div class="form-group">
            <label for="familia">Selecciona una familia: </label>
            <select id="familia" name="familia_id" required>
                <?php foreach ($familias as $familia) : ?>
                    <option value="<?php echo $familia['id']; ?>"><?php echo $familia['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="file" id="imagen" name="imagen" accept="image/*">
        </div>
        <button type="submit" name="crear">Crear Producto</button>
    </form>
    <a href="productos.php"><button class="btn" id="botonListadoCrear">Listado de productos</button></a>

</body>

</html>