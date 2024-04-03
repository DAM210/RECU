<?php

if (isset($_GET['enviar'])) {
    $nombre = $_GET['nombre'];
    $modulos = $_GET['modulos'];
    print "Nombre: " . $nombre . "<br />";
    foreach ($modulos as $modulo) {
        print "Modulo: " . $modulo . "<br />";
    }
} elseif(isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $modulos = $_POST['modulos'];
    print "Nombre: " . $nombre . "<br />";
    foreach ($modulos as $modulo) {
        print "Modulo: " . $modulo . "<br />";
    }
}else{
    print("Ha habido un error con el envío de datos");
}
?>