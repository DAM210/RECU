<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 1</title>
    <link rel="stylesheet" media="screen" href="../css/estilo.css">
</head>

<body>
    <form class="formulario" action="" method="post" name="formulario">
        <ul>
            <li>
                <h1>Reserva de asiento</h1>
            </li>
            <li>
                <label>Nombre:</label>
                <input type="text" name="nombre" placeholder="Lucia Ferreras" maxlength="30" required>
            </li>
            <li>
                <label>DNI:</label>
                <input type="text" name="dni" placeholder="12345678A" maxlength="9" pattern="[0-9]{8}[A-Z]{1}" required>
                <span>El formato deberá ser 01234567A</span>
            </li>
            <li>
                <label>Asiento: </label>
                <select name='plaza' id='plaza'>
                    <?php
                    require_once dirname(__DIR__) . '/vendor/autoload.php';

                    include __DIR__ . '/../src/Clases/FuncionesBD.php';

                    use function Hoja04BBDD03\Clases\getAsientoPrecio;
                    use function Hoja04BBDD03\Clases\reservarAsiento;

                    $plazas = getAsientoPrecio();
                    foreach ($plazas as $plaza) {
                        echo "<option value='" . $plaza['numero'] . "'";
                        if (isset($_POST['plaza']) && $plaza['numero'] == $_POST['plaza']) {
                            echo " selected='true'";
                        }
                        echo ">" . $plaza['numero'] . " (" . $plaza['precio'] . "€)</option>";
                    }
                    ?>
                </select>
            </li>
            <li>
                <button class="submit" type="submit" name="reserva">Reservar</button>
            </li>
            <?php
            if (isset($_POST['reserva'])) {
                $nombre = $_POST['nombre'];
                $dni = $_POST['dni'];
                $asiento = $_POST['plaza'];
                $reservaExitosa = reservarAsiento($nombre, $dni, $asiento);

                if ($reservaExitosa) {
                    echo "<div class='aviso'>Se ha reservado el asiento $asiento <a href='index.php'> Página de inicio</a></div>";
                } else {
                    echo "<div class='aviso'><div class='error'>Error al realizar la reserva. Por favor, inténtelo de nuevo.</div><a href='index.php'>Página de inicio</a></div>";

                }
                
            }
            ?>
        </ul>
    </form>
</body>

</html>