<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 Tema 3</title>
</head>

<body>
    <?php

    //$array = [0 => "Lunes", 1 => "Martes", 2 => "Miercoles", 3 => "Jueves", 4 => "Viernes", 5 => "Sabado", 6 => "Domingo"];

    ?>
    <table border="1">

        <?php

            echo "<tr>";
            echo "<th><p>Nombre</p></th>";
            echo "<th><p>Valor</p></th>";
            echo "</tr>";
        foreach ($_SERVER as $clave => $valor) {
            echo "<tr>";
            echo "<th><p  style='float:left;'>$clave</p></th>";
            echo "<th><p  style='float:left;'>$valor</p></th>";
            echo "</tr>";
        }

        ?>

    </table>

</body>

</html>