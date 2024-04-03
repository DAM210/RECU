<?php
namespace Ejercicio3_2\Clases;
use Ejercicio3_2\Clases\Medico;
use Ejercicio3_2\Funciones\Turno;

class Familia extends Medico{

    public function __construct(protected string $nombre,protected int $edad,protected Turno $turno,private int $num_pacientes)
    {
        parent::__construct($nombre,$edad,$turno);
    }

    public function __toString()
    {
        return parent::__toString()." | Nº de pacientes: $this->num_pacientes";
    }
}

?>