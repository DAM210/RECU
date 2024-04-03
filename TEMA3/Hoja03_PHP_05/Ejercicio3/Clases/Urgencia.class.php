<?php

namespace Ejercicio3_2\Clases;
use Ejercicio3_2\Clases\Medico;
use Ejercicio3_2\Funciones\Turno;

class Urgencia extends Medico{

    public function __construct(protected string $nombre,protected int $edad,protected Turno $turno,private string $unidad)
    {
        parent::__construct($nombre,$edad,$turno);
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getTurno() {
        return $this->turno;
    }
    
    public function __toString()
    {
        return parent::__toString()." | Unidad: $this->unidad";
    }
}

?>