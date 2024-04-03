<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 2 Composer</title>
</head>

<body>
    <h1>Formulario de Contacto</h1>
    <form method="get" action="procesar.php">
        <label for="nombre">Nombre:
        <input type="text" name="nombre" id="nombre" required></label><br><br>

        <label for="correo">Correo Electrónico:
        <input type="text" name="correo" id="correo" required></label><br><br>
        <!--<input type="email" name="correo" id="correo" required><br><br>-->

        <label for="mensaje">Mensaje:
        <textarea name="mensaje" id="mensaje" rows="4" required></textarea></label><br><br>

        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>
