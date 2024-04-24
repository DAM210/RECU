<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Gestión de Plazas</title>
</head>

<body>
    <form class="formulario" action="" method="post">
        <h1>Gestión de Plazas</h1>
        <table>
            <?php
            require_once dirname(__DIR__) . '/vendor/autoload.php';
            include __DIR__ . '/../src/Clases/FuncionesBD.php';

            use function Hoja04BBDD03\Clases\{getAllAsientosPrecio, actualizarPrecios};

            $plazas = getAllAsientosPrecio();
            foreach ($plazas as $plaza) {
                echo "<tr>";
                echo "<td>Plaza {$plaza['numero']}: </td>";
                echo "<td><input type='number' name='nuevo_precio[{$plaza['numero']}]' value='{$plaza['precio']}'></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <button class="submit" type="submit" name="actualizar_precios">Actualizar Precios</button>
        <br>
        <?php
        // Aquí procesamos el formulario enviado para actualizar los precios de las plazas
        if (isset($_POST['actualizar_precios'])) {

            // Obtenemos los nuevos precios enviados desde el formulario
            $nuevosPrecios = $_POST['nuevo_precio'];

            // Llamamos a la función actualizarPrecios para actualizar los precios en la base de datos
            actualizarPrecios($nuevosPrecios);

            // Mostramos un mensaje de confirmación
            echo "<div class='aviso'>Se han actualizado los precios <a href='index.php'> Página de inicio</a></div>";
        }
        ?>
    </form>
</body>

</html>