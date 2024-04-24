<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 1</title>
        <link rel="stylesheet" media="screen" href="../css/estilo.css">
    </head>
    <body>
    <?php
        require_once dirname(__DIR__) . '/vendor/autoload.php';

        use Hoja04BBDD03\Clases\ConexionBD;
        include __DIR__ . '/../src/Clases/FuncionesBD.php';
        use function Hoja04BBDD03\Clases\llegada;

        ?>
        <form class="formulario" action="" method="post" name="formulario">
            <ul>
                <li>
                    <h1>Llegada</h1>
                </li>
                <li>
                    <button class="submit" type="submit" name="llegada">Llegada</button>
                </li>
            </ul>
            <?php
                if(isset($_POST['llegada'])){
                    $hayPasajeros=llegada();
                    if($hayPasajeros){
                        echo "<div class='aviso'>Han llegado los pasajeros, reseteados los pasajeros y asientos
                        <br><a href='index.php'>Volver</a></div>";
                    }else{
                     echo "<div class='aviso'>Error!! No habia pasajeros en el funicular
                     <a href='index.php'>Volver</a></div>";
                    }
                }
            ?>
        </form>
    </body>
</html>