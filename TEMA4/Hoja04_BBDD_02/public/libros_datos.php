<?php
// Incluye el cargador automático de Composer
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Incluye el archivo que contiene las funciones
include __DIR__ . '/../src/Clases/FuncionesBD.php';

// Importa las funciones con un alias
use function Hoja04BBDD02\Clases\obtenerLibros;

// Obtener la lista de libros
$libros = obtenerLibros();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Libros - Datos</title>
</head>

<body>
    <!-- Tabla para mostrar los datos de los libros -->
    <table class="tabla">
        <!-- Cabecera de la tabla -->
        <tr>
            <th>Número de ejemplar</th>
            <th>Título</th>
            <th>Año de Edición</th>
            <th>Precio</th>
            <th>Fecha de adquisición</th>
        </tr>
        <!-- Datos de los libros -->
        <?php foreach ($libros as $libro) : ?>
            <tr>
                <td><?php echo $libro['numero_ejemplar']; ?></td>
                <td><?php echo $libro['titulo']; ?></td>
                <td><?php echo $libro['anyo_edicion']; ?></td>
                <td><?php echo $libro['precio']; ?></td>
                <td><?php echo $libro['fecha_adquisicion']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <!-- Enlace para volver a la página de libros -->
    <br>
    <a href="libros.php">Volver</a>
</body>

</html>