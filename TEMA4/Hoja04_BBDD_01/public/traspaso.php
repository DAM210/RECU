<?php

// Incluye el cargador automático de Composer
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Incluye el archivo que contiene las funciones
include __DIR__ . '/../src/Clases/FuncionesBD.php';

// Importa las funciones con un alias
use function Hoja04BBDD01\Clases\{getEquipos as obtenerEquipos, getJugadores as obtenerJugadores, getPosiciones as getPosiciones, darBaja as darBaja, darAlta as darAlta};

// Obtiene la lista de equipos llamando a la función con el alias
$equipos = obtenerEquipos();

// Variable para almacenar el equipo seleccionado
$equipoSeleccionado = '';

// Verifica si se ha enviado el formulario de mostrar jugadores
if (isset($_POST["mostrar"])) {
    // Obtiene el nombre del equipo seleccionado
    $equipoSeleccionado = $_POST["equipo"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Traspaso de Jugadores</title>
</head>

<body>

    <form action="" method="post" class="formulario">
        <ul>
            <li>
                <h1>Traspasos de jugadores</h1>
            </li>
            <li>
                <label for="equipo">Equipo:</label>
                <select name="equipo" required>
                    <?php
                    // Genera opciones para cada equipo en el menú desplegable
                    foreach ($equipos as $equipo) {
                        echo "<option value='$equipo'";
                        if ($equipo == $equipoSeleccionado)
                            echo "selected=true;";
                        echo ">$equipo</option>";
                    }
                    ?>
                </select>
            </li>
            <li>
                <label for="mostrar"></label>
                <button type="submit" class="submit" name="mostrar">Mostrar</button>
            </li>
        </ul>
    </form>

    <?php
    // Verifica si se ha enviado el formulario de mostrar jugadores
    if (isset($_POST["mostrar"])) {
    ?>
        <form action="" method="post" class="formulario">
            <input type="hidden" name="equipo" value="<?php echo $equipoSeleccionado; ?>">
            <ul>
                <li>
                    <h2>Baja y alta de jugadores</h2>
                </li>
                <li>
                    <label for="jugador">Baja de jugador:</label>
                    <select name="jugador" required>
                        <?php
                        // Carga los jugadores asociados al equipo seleccionado
                        $jugadores = obtenerJugadores($equipoSeleccionado);
                        foreach ($jugadores as $jugador) {
                            echo "<option value='$jugador[0]'>$jugador[0]</option>";
                        }
                        ?>
                    </select>
                </li>
                <h3>Datos del nuevo jugador</h3>
                <li>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" required>
                </li>
                <li>
                    <label for="procedencia">Procedencia:</label>
                    <input type="text" name="procedencia" required>
                </li>
                <li>
                    <label for="altura">Altura:</label>
                    <input type="number" name="altura" step="0.01" required>
                </li>
                <li>
                    <label for="peso">Peso:</label>
                    <input type="number" name="peso" step="0.01" required>
                </li>
                <li>
                    <label for="posicion">Posición:</label>
                    <select name="posicion" required>
                        <?php
                        // Obtener las posiciones de los jugadores
                        $posiciones = getPosiciones();

                        // Generar opciones para cada posición en el menú desplegable
                        foreach ($posiciones as $posicion) {
                            echo "<option value='$posicion'>$posicion</option>";
                        }
                        ?>
                    </select>
                </li>
                <li>
                    <button type="submit" class="submit" name="enviar">Realizar traspaso</button>
                </li>
            </ul>
        </form>
    <?php
        // Verifica si se ha enviado el formulario de traspaso
        if (isset($_POST["enviar"])) {
            // Obtiene los datos del formulario
            $equipo = $_POST["equipo"];
            $jugadorSeleccionado = $_POST["jugador"];
            $nombre = $_POST["nombre"];
            $procedencia = $_POST["procedencia"];
            $altura = $_POST["altura"];
            $peso = $_POST["peso"];
            $posicion = $_POST["posicion"];

           
        }
    }

    ?>

</body>

</html>
