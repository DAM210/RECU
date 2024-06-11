<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de jQuery</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#alertButton').click(function(){
                alert('¡Hola! Has presionado el botón.');
            });
        });
    </script>
</head>
<body>
    <button id="alertButton">Mostrar Alert</button>
</body>
</html>
