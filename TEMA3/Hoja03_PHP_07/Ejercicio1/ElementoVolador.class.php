<?php

abstract class ElementoVolador implements Volador
{

    public function __construct(private string $nombre, private int $numAlas, private int $numMotores, private float $altitud, private float $velocidad)
    {
        $altitud = 0;
        $velocidad = 0;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getAltitud()
    {
        return $this->altitud;
    }
    public function setAltitud($altitud)
    {
        $this->altitud = $altitud;
    }

    public function getNumAlas()
    {
        return $this->numAlas;
    }
    public function setNumAlas($numAlas)
    {
        $this->numAlas = $numAlas;
    }

    public function getNumMotores()
    {
        return $this->numMotores;
    }
    public function setNumMotores($numMotores)
    {
        $this->numMotores = $numMotores;
    }

    public function getVelocidad()
    {
        return $this->velocidad;
    }
    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    public function volando(): bool
    {
        if ($this->altitud > 0)
            return true;
        else
            return false;
    }

    public function acelerar($velocidad)
    {
        if ($velocidad > 0)
            $this->velocidad = $velocidad;
    }

    public abstract function volar($altitud);

    public abstract function mostrarInfo($mensaje);
}
?>