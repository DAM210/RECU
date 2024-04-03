<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Ejercicio 2 Hoja 10</title>
    <link rel="stylesheet" media="screen" href="css/estilo.css">
</head>

<body>

<?php
    $liga=array(
        "Real Madrid"=>array(
            "entrenador"=>array("nombre"=>"Zidane","ruta"=>"jugadores/zidane.jpg"),
            "jugadores"=>array(
                array("nombre"=>"Courtois","ruta"=>"jugadores/courtois.jpg"),
                array("nombre"=>"Sergio Ramos","ruta"=>"jugadores/ramos.jpg"),
                array("nombre"=>"Hazard","ruta"=>"jugadores/hazard.jpg")
            ),
        ),
        "Barcelona"=>array(
            "entrenador"=>array("nombre"=>"Koeman","ruta"=>"jugadores/koeman.jpg"),
            "jugadores"=>array(
                array("nombre"=>"Ter Stegen","ruta"=>"jugadores/ter.jpg"),
                array("nombre"=>"Piqué","ruta"=>"jugadores/pique.jpg"),
                array("nombre"=>"Griezmann","ruta"=>"jugadores/griezmann.jpg")
            ),
        ),
    );
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="formulario">
    <ul>
        <li>
            <h1>Elige un equipo</h1>
        </li>
        <li>
            <label for="equipo">Equipo:</label>
            <select name="equipo" id="equipo">
                    <option value="todos">--Todos--</option>
                    <?php
                    foreach (array_keys($liga) as $equipo) {
                        echo '<option value="' . $equipo . '"';
                        if (isset($_POST['equipo']) && $equipo == $_POST['equipo']) {
                            echo ' selected="selected"';
                        }
                        echo '>' . $equipo . '</option>';
                    }
                    ?>
                </select>
        </li>
	    <li>
            <label>Puestos</label>
            <input type="radio" id="entrenador" name="radio" value="entrenador" checked <?php if (isset($_POST['radio']) && ($_POST['radio']==='entrenador')) {echo ' checked="checked"';} ?>>
            <label for="entrenador">Entrenador</label>
            <input type="radio" id="jugadores" name="radio" value="jugadores" <?php if (isset($_POST['radio']) && ($_POST['radio']==='jugadores')) {echo ' checked="checked"';} ?>>
            <label for="jugadores">Jugadores</label>
                
        </li>

        <li>
            <button type="submit" class="submit" name="buscar">Buscar</button>
        </li>
        
    </ul>
    
    </form>
    <?php

    if(isset($_POST["buscar"])){

        $puesto=$_POST["radio"];
        $equipo=$_POST["equipo"];

        if ($equipo === 'todos') {
            $equiposSeleccionados = $liga;
        } elseif (array_key_exists($equipo, $liga)) {   //comprueba que el equipo se encuentra en la matriz $liga
            $equiposSeleccionados = array($equipo => $liga[$equipo]);   //si existe creamos un array de ese equipo
        }
    
        echo "<table class='tabla'>";
        echo '<tr><th>Equipo</th><th>Puestos</th><th>Imagen</th></tr>';
        
        if ($puesto === 'entrenador') {     //si el puesto es de entrenador, mostramos su nombre y su foto
            foreach ($equiposSeleccionados as $nombreEquipo => $equipo) {
                echo '<tr>';
                echo '<td><h2>' . $nombreEquipo . '</h2></td>';
                echo '<td><h2>Entrenador:</h2></td>';
                echo '<td>';
                echo '<h2>' . $equipo['entrenador']['nombre'] . '</h2>';
                echo '<img src="' . $equipo['entrenador']['ruta'] . '" alt="Imagen del entrenador"></td>';
                echo '</tr>';
            }
        } else{//si el puesto es de jugadores, mostramos los nombres y fotos de cada uno
            foreach ($equiposSeleccionados as $nombreEquipo => $equipo) { //array equipo  
                echo '<tr>';
                echo '<td><h2>' . $nombreEquipo . '</h2></td>';
                echo '<td><h2>Jugadores:</h2></td>';
                echo '<td>';
                foreach ($equipo['jugadores'] as $jugador) { //array jugadores -> nombre y ruta
                    echo '<h2>' . $jugador['nombre'] . '</h2>';
                    echo '<img src="' . $jugador['ruta'] . '" alt="Imagen del jugador"><br><br>';
                }
                echo '</td>';
                echo '</tr>';
            }
        }
        
        echo '</table>';
    }
    ?>

</body>
<html>