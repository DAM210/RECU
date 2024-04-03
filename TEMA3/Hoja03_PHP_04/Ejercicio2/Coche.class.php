<?php

class Coche{

    private $matricula;
    private $velocidad;

    public function __construct($matricula,$velocidad){

        $this->matricula=$matricula;
        $this->velocidad=$velocidad;

    }

    public function acelera($valor){

        if($this->velocidad+$valor<120)
            $this->velocidad+=$valor;
        else
        $this->velocidad=120;

    }

    public function frena($valor){

        if($this->velocidad>0 && $this->velocidad>$valor)
            $this->velocidad-=$valor;
        else
            $this->velocidad=0;
        
    }

    public function __toString():string{
        
        return "Matricula: $this->matricula. Velocidad: $this->velocidad";
    }

}
