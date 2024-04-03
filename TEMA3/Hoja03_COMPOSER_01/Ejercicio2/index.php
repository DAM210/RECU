<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 2 Composer</title>
</head>

<body>
    <h1>Formulario de Contacto</h1>
    <form method="post" action="procesar.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" id="correo" required><br><br>

        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje" rows="4" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>
