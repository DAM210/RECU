<?php

if (isset($_REQUEST['enviar'])) {
    $nombre = $_REQUEST['nombre'];
    $modulos = $_REQUEST['modulos'];
    print "Nombre: " . $nombre . "<br />";
    foreach ($modulos as $modulo) {
        print "Modulo: " . $modulo . "<br />";
    }
}

?>