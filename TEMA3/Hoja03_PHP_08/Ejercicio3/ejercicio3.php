<html>

<head>
    <title>Desarrollo Web</title>
</head>

<body>

<h2>GET</h2>
    <form name="input" action="procesa.php" method="get">
        <label for="nombre">Nombre del alumno: </label>
        <input type="text" name="nombre" id="nombre" />
        <br />
        <p>Módulos que cursa:</p>
        <input type="checkbox" name="modulos[]" value="DWES" />Desarrollo web en entorno servidor<br />
        <input type="checkbox" name="modulos[]" value="DWEC" />Desarrollo web en entorno cliente<br /> <br />
        <input type="submit" name="enviar" value="Enviar" />
    </form>

    <h2>POST</h2>
    <form name="input" action="procesa.php" method="post">
        <label for="nombre">Nombre del alumno: </label>
        <input type="text" name="nombre" id="nombre" />
        <br />
        <p>Módulos que cursa:</p>
        <input type="checkbox" name="modulos[]" value="DWES" />Desarrollo web en entorno servidor<br />
        <input type="checkbox" name="modulos[]" value="DWEC" />Desarrollo web en entorno cliente<br /> <br />
        <input type="submit" name="enviar" value="Enviar" />
    </form>

</body>