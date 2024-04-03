<?php
namespace Ejercicio3_2\Funciones;
use Ejercicio3_2\Funciones\Turno;
use Ejercicio3_2\Clases\Urgencia;

function mayoresDe60Anios($objetos, $cont): int {
    foreach ($objetos as $objeto) {
        // Verificar si el objeto es una instancia de Urgencia y su turno es "TARDE"
        if ($objeto instanceof Urgencia && $objeto->getTurno() == Turno::TARDE) {
            // Verificar si la edad del médico es mayor de 60 años
            if ($objeto->getEdad() > 60) {
                $cont++;
            }
        }
    }
    return $cont;
}
?>