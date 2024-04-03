<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
</head>

<body>
    <h1>Formulario de Contacto</h1>
    <?php
    // Mensajes de éxito y error
    $successMessage = "El email se ha enviado correctamente.";
    $errorMessage = "Ha ocurrido un error al enviar el email. Por favor, inténtelo de nuevo.";

    // Verificar si hay un parámetro "success" en la URL
    if (isset($_GET['success'])) {
        echo '<p style="color: green;">' . $successMessage . '</p>';
    } elseif (isset($_GET['error'])) { // Verificar si hay un parámetro "error" en la URL
        $errorCode = $_GET['error'];
        switch ($errorCode) {
            case 1:
                echo '<p style="color: red;">Por favor, rellene todos los campos.</p>';
                break;
            case 2:
                echo '<p style="color: red;">Por favor, introduzca un email válido.</p>';
                break;
            case 3:
                echo '<p style="color: red;">' . $errorMessage . '</p>';
                break;
            default:
                echo '<p style="color: red;">Ha ocurrido un error desconocido.</p>';
        }
    }
    ?>
    <form action="src/procesar.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="email">Correo electrónico:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea><br>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>