<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de jQuery - load()</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#loadTxtButton').click(function(){
                $('#contentDiv').load('contenido.txt');
            });

            $('#loadPhpButton').click(function(){
                $('#contentDiv').load('contenido.php');
            });
        });
    </script>
</head>
<body>
    <button id="loadTxtButton">Cargar Contenido TXT</button>
    <button id="loadPhpButton">Cargar Contenido PHP</button>
    <div id="contentDiv"></div>
</body>
</html>
