<?php

class Encargado extends Empleado{

    public function __construct(float $sueldo)
    {
        parent::__construct($sueldo);
    }

    public function getSueldo():float{
        //$sueldoEncargado=parent::getSueldo()+parent::getSueldo()*0.15;
        $sueldoEncargado=$this->sueldo+$this->sueldo*0.15;
        return $sueldoEncargado;
    }
}

?>