<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Validación de Formulario</title>
    <!-- Importamos la librería jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Asociamos la función al evento click del botón con id 'submitForm'
            $('#submitForm').click(function(event) {
                // Evitamos el comportamiento por defecto del formulario (recarga de página)
                event.preventDefault();
                
                // Realizamos una llamada AJAX al archivo 'validar.php'
                $.ajax({
                    url: 'validar.php', // URL al archivo PHP que procesará el formulario
                    type: 'POST', // Método de envío
                    data: $('#formulario').serialize(), // Serializamos los datos del formulario
                    success: function(response) {
                        // Parseamos la respuesta JSON del servidor
                        let resultado = JSON.parse(response);

                        // Si queremos que nos salga un mensaje en caso de que todo vaya bien
                        if (resultado.success) {
                            // Mostramos una alerta con el mensaje de éxito
                            alert(resultado.success);
                        } else {
                            // Si hay errores, mostramos una alerta por cada uno
                            for (let error in resultado) {
                                alert(resultado[error]);
                            }
                        }

                        // Si solo nos interesa sacar los errores
                        /*
                        for (let error in resultado) {
                            alert(resultado[error]);
                        }
                        */
                    }
                });
            });
        });
    </script>
</head>

<body>
    <form id="formulario">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password"><br><br>

        <label for="password2">Repetir Contraseña:</label>
        <input type="password" id="password2" name="password2"><br><br>

        <button id="submitForm">Enviar</button>
    </form>
</body>

</html>
