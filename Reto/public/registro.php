<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
include __DIR__ . '/../src/Funciones/funciones.php';
use function Reto\Funciones\{registrarUsuario}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>REGISTRO</title>
</head>

<body>
    <?php
    if (isset($_POST['registrar'])) {

        if (isset($_POST['usuario']) && isset($_POST['passwd']) && isset($_POST['passwd2'])) {

            if ($_POST['passwd'] == $_POST['passwd2']) {

                if (registrarUsuario($_POST['usuario'], ($_POST['passwd']))) {
                    session_start();
                    $arrUser = array('nombre' => $_POST['usuario'], 'password' => md5($_POST['passwd']));
                    $_SESSION['usuario'] = $arrUser;
                    header('Location: ' . 'registro.php');
                } else {
                    echo "USUARIO ya esta registrado";
                }
            } else {
                echo "CONTRASEÑAS NO COINCIDEN";
            }
        }
    }
    ?>
    <form class="formLog" method="post" action="">
        <fieldset>
            <legend>Registro de usuarios</legend>
            <label for="usuario">Nombre usuario: </label>
            <input type="text" id="usuario" name="usuario" required><br>
            <label for="passwd">Contraseña: </label>
            <input type="password" id="passwd" name="passwd" required><br>
            <label for="passwd">Repita la contraseña: </label>
            <input type="password" id="passwd2" name="passwd2" required><br>
            <button type='submit' name='registrar' class="btn">Registrar</button>
            <a href='login.php'> <button type='button'class="btn">Iniciar sesión</button></a>
        </fieldset>
    </form>
</body>

</html>