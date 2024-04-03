<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 2 Hoja 9</title>
    <link rel="stylesheet" media="screen" href="../css/estilo.css">
</head>

<body>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="formulario">
        <ul>
            <li>
                <h1>Buscador de películas</h1>
            </li>
            <li>
                <label for="buscador">Buscador
                    <input type="text" id="buscador" name="buscador" autofocus required>
                </label>
            </li>
            <li>
                <button type="submit" class="submit" name="buscar">Buscar</button>
            </li>
        </ul>

    </form>

    <?php

    $peliculas = array(
        "Amelie", "El caballero oscuro", "El lobo de Wall Street", "El pianista", "12 años de esclavitud", "Malditos bastardos", "Memento",
        "No es país para viejos", "Origen", "Spotlight"
    );

    if (isset($_POST["buscar"])) {
        echo "<ul>";

        $buscador = strtolower($_POST["buscador"]);

        foreach ($peliculas as $peli) {
            if (str_contains(strtolower($peli), $buscador) !== false) {
                echo "<li>$peli</li>";
            }
        }

        echo "</ul>";
    }
    ?>


</body>

</html>