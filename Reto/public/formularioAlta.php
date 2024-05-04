<?php
// Obtener las opciones de familia desde la base de datos
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Reto\Clases\BaseDatos;

$conexion = BaseDatos::getConexion();

try {
    $queryFamilias = $conexion->query("SELECT id, nombre FROM familias");
    $familias = $queryFamilias->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener las familias: " . $e->getMessage();
    // Manejo del error, como redireccionar a una página de error o mostrar un mensaje al usuario
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
    <form action="procesarFormulario.php" method="POST" enctype="multipart/form-data">
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
        <button type="submit">Crear Producto</button>
    </form>
</body>

</html>