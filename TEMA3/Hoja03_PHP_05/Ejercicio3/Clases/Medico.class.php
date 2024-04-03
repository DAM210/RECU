<?php
namespace Ejercicio3_2\Clases;
use Ejercicio3_2\Funciones\Turno;

abstract class Medico{

    public function __construct(protected string $nombre,protected int $edad,protected Turno $turno)
    {
    }

    public function __toString()
    {
        return "Nombre: $this->nombre | Edad: $this->edad | Turno: ".$this->turno->name;
    }
    
}

?>
