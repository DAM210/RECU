<?php

namespace HOJA6\Clases;

require_once __DIR__ . '/../Interfaces/Volador.php';
use HOJA6\Interfaces\Volador;

abstract class ElementoVolador implements Volador {

    public function __construct(protected string $nombre, protected int $numAlas, protected int $numMotores, private float $altitud=0, private float $velocidad=0){
    }

    public function getNombre()
    {
        return $this->nombre;
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

    public function getNumMotores()
    {
        return $this->numMotores;
    }

    public function getVelocidad()
    {
        return $this->velocidad;
    }

    public function volando():bool{
        return $this->altitud>0;
    }

    public function acelerar($velocidad):void{
        if ($velocidad > 0)
            $this->velocidad = $velocidad;
    }

    public abstract function volar(float $altitud):void;

    public abstract function mostrarInformacion():string;

}
