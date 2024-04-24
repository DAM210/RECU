<?php
require_once '../vendor/autoload.php';

// Incluye el archivo que contiene las funciones
include __DIR__ . '/../src/Clases/FuncionesBD.php';

// Importa las funciones con un alias
use function Hoja04BBDD02\Clases\{guardarLibro as guardarLibro};

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y procesar los datos recibidos del formulario
    $titulo = $_POST['titulo'];
    $anio = $_POST['anio'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];

    // Validar los datos recibidos

    // Procesar los datos y guardar el libro en la base de datos
    $guardadoExitoso = guardarLibro($titulo, $anio, $precio, $fecha);

    // Verificar si el libro se guardó correctamente
    if ($guardadoExitoso) {
        echo "<p>Datos guardados correctamente.</p>";
    } else {
        echo "<p>Error al guardar los datos del libro.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Libros</title>
</head>

<body>
    <!-- Enlace para volver a la página de libros -->
    <br>
    <a href="libros.php">Volver a la página de libros</a>
</body>

</html>