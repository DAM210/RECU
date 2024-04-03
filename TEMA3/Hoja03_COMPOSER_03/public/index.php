<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio composer 3</title>
</head>

<body>

    <form action="" method="post">
        <h1>Generar contraseña</h1>
        <fieldset>
            <legend>Requisitos</legend>
            <input type="checkbox" name="mayus" value="Mayúsculas">Mayúsculas</br>
            <input type="checkbox" name="minus" value="Minúsculas">Minúsculas</br>
            <input type="checkbox" name="num" value="Números">Números</br>
            <input type="checkbox" name="simb" value="Símbolos">Símbolos</br>
            <label for="longitud">
                Longitud:
                <input type="number" name="long" id="longitud" min="8">
            </label>
            <input type="submit" name="enviar" id="enviar" value="Enviar">

        </fieldset>
    </form>
    <?php
    require_once __DIR__ . "/../vendor/autoload.php";

    use MiAplicacion\Clases\AdaptadorGeneradorPassword;

    if (isset($_POST["enviar"])) {
        $longitud = $_POST["long"];

        if (isset($_POST["mayus"]) == 1) {
            $mayusculas = true;
        } else {
            $mayusculas = false;
        }

        if (isset($_POST["minus"]) == 1) {
            $minusculas = true;
        } else {
            $minusculas = false;
        }

        if (isset($_POST["num"]) == 1) {
            $numeros = true;
        } else {
            $numeros = false;
        }

        if (isset($_POST["simb"]) == 1) {
            $simbolos = true;
        } else {
            $simbolos = false;
        }

        $generar = new AdaptadorGeneradorPassword();
        $password=$generar->generar($mayusculas, $minusculas, $numeros, $simbolos,$longitud);
        echo "<p>Contraseña creada: $password</p>";
    }

    ?>
</body>

</html>