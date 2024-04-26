<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesa</title>
</head>

<body>
    <?php
    require_once dirname(__DIR__) . '/vendor/autoload.php';

    use function Reto\Funciones\{
        validarRequerido,
        validarNumerico,
        validarLongitud,
        validarFormatoImagen,
        validarSubidaFichero,
        moverFicheroSubido,
        limpiarEntrada,
        redireccionar
    };

    use Ejercicio1\Clases\GrupoRock;
    use Ejercicio1\Clases\Imagen;
    use Ejercicio1\Clases\Grupo;
    use Ejercicio1\Clases\PDOGrupo;

    if (isset($_POST['enviar'])) {
        // Validar que los campos no estén vacíos
        if (!validarRequerido($_FILES['fichero']['name'])) redireccionar('index.php?error=1');

        foreach ($_POST as $clave => $valor) {
            if (!validarRequerido($valor)) redireccionar('index.php?error=1');
        }

        // Validar el año
        if (!validarNumerico($_POST['anoFundacion'])) redireccionar('index.php?error=4');
        if (!validarLongitud($_POST['anoFundacion'], 4)) redireccionar('index.php?error=4');

        // Validar formatos imagen
        if (!validarFormatoImagen($_FILES['fichero']['type'])) redireccionar('index.php?error=3');

        // Validar la subida de la imagen
        if (validarSubidaFichero($_FILES)) {
            // Asignar un ID único al nombre de la imagen y sustituir espacios por '_' si los tuviese
            $_FILES['fichero']['name'] = str_replace(' ', '_', uniqid() . '-' . $_FILES['fichero']['name']);

            // Movemos el fichero imagen a la ubicación img
            if (moverFicheroSubido($_FILES)) {
                limpiarEntrada();

                // Creación del grupo en base de datos
                $imagen = new Imagen($_FILES['fichero']['name'], '/img/' . $_FILES['fichero']['name']);

                if ((new Grupo(new PDOGrupo()))->crearGrupo(new GrupoRock($_POST['nombreGrupo'], $_POST['anoFundacion'], $imagen, $_POST['historia']))) {
                    redireccionar('index.php?success=1'); // El grupo ha sido dado de alta correctamente
                } else {
                    unlink(dirname(__DIR__) . '/public/img/' . $_FILES['fichero']['name']);
                    redireccionar('index.php?error=5'); // No se ha podido guardar el grupo en base de datos
                }
            } else {
                redireccionar('index.php?error=2'); // No se puede procesar el archivo
            }
        } else {
            redireccionar('index.php?error=2'); // No se puede procesar el archivo
        }
    }
    ?>
</body>

</html>