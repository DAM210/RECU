<?php
require_once '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y procesar los datos recibidos del formulario
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
    <!-- Formulario para introducir datos del libro -->
    <form action="libros_guardar.php" method="POST" class="formulario">
        <ul>
            <li>
                <h1>Inserte los datos del libro</h1>
            </li>
            <li>
                <label for="titulo">Título:</label><br>
                <input type="text" id="titulo" name="titulo" required><br>

                <label for="anio">Año de Edición:</label><br>
                <input type="number" id="anio" name="anio" required><br>

                <label for="precio">Precio:</label><br>
                <input type="number" id="precio" name="precio" step="0.01" required><br>

                <label for="fecha">Fecha de Adquisición:</label><br>
                <input type="date" id="fecha" name="fecha" required><br><br>

                <button type="submit" class="submit" name="guardar">Guardar datos del libro</button>
            </li>
        </ul>

    </form>

    <!-- Enlace para ver todos los libros -->
    <br>
    <a href="libros_datos.php">Mostrar los libros guardados</a>
</body>

</html>