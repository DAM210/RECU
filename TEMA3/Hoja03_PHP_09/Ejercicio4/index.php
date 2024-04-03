<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Ejercicio 2 Hoja 9</title>
    <link rel="stylesheet" media="screen" href="../css/estilo.css">
</head>

<body>
    

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="formulario">
    <ul>
        <li>
            <h1>Suma de cantidades</h1>
        </li>

        <?php
            for($i=1;$i<=10;$i++){
                echo "<li><label for='cantidad$i'>Cantidad $i:</label>";
                echo "<input type='number' id='cantidad$i' name='cantidad$i' min='1'></li>";
            }
        ?>
        <li>
            <button type="submit" class="submit" name="sumar">Sumar</button>
        </li>
    </ul>

    </form>
    <?php
    
        if(isset($_POST["sumar"])){
            $suma=0;
            for($i=1;$i<=10;$i++){
                if(!empty($_POST["cantidad".$i])){
                    $suma+=$_POST["cantidad".$i];
                }
                
            }

            echo "<div class='aviso'> La suma es $suma </div>";

        }
    ?>
</body>
<html>