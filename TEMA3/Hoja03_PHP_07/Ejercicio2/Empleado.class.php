<?php

class Empleado{
    
    use Laboral,Personal;
    public function __construct(private string $nombre,private int $edad,private string $direccion,private string $codigo,private float $salario)
    {
        $this->actualizarInfoP($nombre,$edad,$direccion);
        $this->actualizarInfoL($codigo,$salario);
    }

    public function __toString()
    {
        return "Informacion personal: </br>
        Nombre: $this->nombre | Edad: $this->edad | Direccion: $this->direccion</br>
        Informacion laboral: </br>
        Codigo: $this->codigo | Salario: $this->salario";

    }
}

?>