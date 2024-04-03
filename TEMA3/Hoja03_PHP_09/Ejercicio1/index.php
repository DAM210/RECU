<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 1 Hoja 9</title>
    <link rel="stylesheet" media="screen" href="../css/estilo.css">
</head>

<body>

    <?php

    $euros = array("euros" => 1, "libras" => 0.86, "dolares" => 0.98);
    $libras = array("libras" => 1, "euros" => 1 / $euros["libras"], "dolares" => 1.14);
    $dolares = array("dolar" => 1, "euros" => 1 / $euros["dolares"], "libras" => 1 / $euros["libras"]);
    $cambios = array("euros" => $euros, "libras" => $libras, "dolares" => $dolares);

    if (isset($_POST["convertir"])) {
        if (is_numeric($cantidad = $_POST["cantidad"])) {
            $cantidad = $_POST["cantidad"];
            $origen = $_POST["origen"];
            $destino = $_POST["destino"];

            $resultado = round($cantidad * $cambios[$origen][$destino], 2);

            echo "<div class='aviso'>$cantidad $origen son $resultado $destino</div>";
        }
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="formulario">
        <ul>
            <li>
                <h1>Conversor de monedas</h1>
            </li>
            <li>
                <label for="cantidad">Cantidad:*</label>
                <input type="number" id="cantidad" name="cantidad" required>
            </li>
            <li>
                <label for="origen">Origen:*</label>

                <select name="origen" id="origen">
                    <?php
                    foreach ($cambios as $key => $valor) {
                        echo "<option value='$key'>$key</option>";
                    }
                    ?>
                </select>
            </li>
            <li>
                <label for="destino">Destino:*</label>

                <select name="destino" id="destino">
                    <?php
                    foreach ($cambios as $key => $valor) {
                        echo "<option value='$key'>$key</option>";
                    }
                    ?>
                </select>
            </li>
            <li>
                <button type="submit" class="submit" name="convertir">Convertir</button>
            </li>
        </ul>

    </form>


</body>

</html>