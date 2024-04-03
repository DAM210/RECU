<?php

trait Personal{
    private string $nombre;
    private int $edad;
    private string $direccion;

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function setEdad($edad){
        $this->edad=$edad;
    }

    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }

    public function actualizarInfoP($nombre,$edad,$direccion){
        $this->setNombre($nombre);
        $this->setEdad($edad);
        $this->setDireccion($direccion);
    }
}

?>