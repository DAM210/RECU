<?php

class Circulo
{

    private $radio;

    public function __construct($radio)
    {

        $this->radio = $radio;
    }

    /*public function setRadio($radio){

        $this->radio=$radio;

    }

    public function getRadio():int{

        return $this->radio;
        
    }*/

    public function __set($atributo, $valor)
    {
        if (property_exists(__CLASS__, $atributo)) {
            $this->atributo = $valor;
        } else {
            echo "No existe el atributo $atributo";
        }
    }

    public function __get($atributo)
    {
        if (property_exists(__CLASS__, $atributo)) {
            return $this->atributo;
        }
        //return NULL;
    }
}
