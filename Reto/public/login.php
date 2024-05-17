<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

include __DIR__ . '/../src/Funciones/funciones.php';
use function Reto\Funciones\{verificarUsuario};

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Iniciar sesión</title>
</head>

<body>
    <?php
    if (isset($_POST['iniciar'])) {

        if (isset($_POST['usuario']) && isset($_POST['passwd'])) {

            if (verificarUsuario($_POST['usuario'], md5($_POST['passwd']))) {
                $arrUser = array('nombre' => $_POST['usuario'], 'password' => md5($_POST['passwd']));
                session_start();
                $_SESSION['usuario'] = $arrUser;
                header('Location: ' . 'productos.php');
            } else {
                echo "No se pudo iniciar sesion.";
            }
        }
    }
    ?>
    <form method="post" action="">
        <fieldset>
            <legend>Iniciar Sesion</legend>
            <label for="usuario">Nombre usuario: </label>
            <input type="text" id="usuario" name="usuario" required><br>
            <label for="passwd">Contraseña: </label>
            <input type="password" id="passwd" name="passwd" required><br>
            <button type='submit' name='iniciar'>Iniciar sesion</button>
            <a href='registro.php'> <button type='button'>Registro</button></a>
        </fieldset>
    </form>
</body>

</html>