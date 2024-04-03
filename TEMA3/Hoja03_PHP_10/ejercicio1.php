<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 1 Hoja 10</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>


<body>

    <?php
    if (isset($_POST['actualizar'])) {
        //recupera los modelos originales de coches de los campos ocultos (cochesOriginales) y los modelos actualizados
        $cochesAct = $_POST['cochesActualizados'];
        $cochesOrig = $_POST['cochesOriginales'];

        if (count($cochesOrig) === count($cochesAct)) { //compara la cantidad de modelos que hay en cada uno
            for ($i = 0; $i < count($cochesOrig); $i++) {
                if ($cochesOrig[$i] != $cochesAct[$i]) {    //compara y comprueba si ha habido algun cambio
                    echo "<div class='aviso'>Se ha actualizado {$cochesOrig[$i]} por {$cochesAct[$i]}</div>";
                }
            }
        } else {
            echo "<div class='aviso'>La cantidad de modelos actualizados no coincide con la cantidad de modelos originales.</div>";
        }
    }
    ?>

    <form class="formulario" action="" method="post">
        <ul>
            <li>
                <h1>Busca tu coche</h1>
            </li>
            <li>
                <label for="coche">Marca:*
                    <select name="marca" id="coche"><!-- el selected es para que la opcion se quede seleccionada despues del action-->
                        <option value="seat" <?php if (isset($_POST['marca']) && ($_POST['marca']==='seat')) {echo ' selected="selected"';} ?>>Seat</option>
                        <option value="renault" <?php if (isset($_POST['marca']) && ($_POST['marca']==='renault')) {echo ' selected="selected"';} ?>>Renault</option>
                        <option value="peugeot" <?php if (isset($_POST['marca']) && ($_POST['marca']==='peugeot')) {echo ' selected="selected"';} ?>>Peugeot</option>
                    </select>
                </label>
            </li>
            <li>
                <label>
                    <button type="submit" class="submit" name="mostrar">Mostrar</button>
                </label>
            </li>
        </ul>

        <?php
        $coches = array(
            "seat" => array("Ibiza", "León", "Alhambra", "Arona", "Ateca", "Tarraco"),
            "renault" => array("Megane", "Clio", "Captur", "Scenic"),
            "peugeot" => array("108", "208", "308", "408", "508")
        );

        if (isset($_POST['mostrar'])) {
            $marca = $_POST['marca'];
            $html = "<table class='tabla'><tr><td>COCHE</td></tr>";

            foreach ($coches[$marca] as $modelo) {     //muestra los modelos de la marca elegida
                $html .= "<tr><td><input type='text' name='cochesActualizados[]' value='$modelo'/></td></tr>";
            }
            // almacena los modelos originales en el formulario
            foreach ($coches[$marca] as $modelo) {
                $html .= "<input type='hidden' name='cochesOriginales[]' value='$modelo'/>"; //para almacenar los modelos originales de la marca seleccionada
            }


            $html .= "<tr><td><input class='submit' type='submit' name='actualizar' value='Actualizar'/></td></tr></table>";
            echo $html;
        }
        ?>

    </form>
</body>

</html>