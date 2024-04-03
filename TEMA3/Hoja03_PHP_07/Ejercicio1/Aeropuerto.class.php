<?php

class Aeropuerto{

    public function __construct(private array $eVoladores)
    {
    }

    public function insertar(ElementoVolador $eVolador){
        $this->eVoladores[]=$eVolador;
    }

    public function buscar ($nombre){
        $encontrado=false;
        foreach($this->eVoladores as $objeto){
            if($objeto->getNombre()==$nombre){
                print "Localizado: ".$objeto->mostrarInfo();
                $encontrado=true;
            }
        }
        if(!$encontrado){
            printf("%s no encontrado en el aeropuerto\n", $nombre);
        }
    }

    public function listarCompania($compania)
    {
        $encontrado=false;
        print "Lista compañia:</br>";
        foreach($this->eVoladores as $objeto){
            if($objeto instanceof Avion){

                if($objeto->getCompania()==$compania){
                    print "- ".$objeto->mostrarInfo();
                    $encontrado=true;
                }
            }
        }
        if(!$encontrado){
            printf("Aviones de la compañia %s no encontrados en el aeropuerto\n", $compania);
        }
    }

    public function rotores($rotor){
        foreach($this->eVoladores as $objeto){
            if($objeto instanceof Helicoptero){

                if($objeto->getNRotores()==$rotor){
                    print $objeto->mostrarInfo();
                }
            }
        }
        return null;
    }

    public function despegar($nombre,$altitud,$velocidad){
        foreach($this->eVoladores as $objeto){
            if($objeto->getNombre()==$nombre){
                $objeto->acelerar($velocidad);
                $objeto->volar($altitud);
                return $objeto;
            }
        }
        return null;
    }
}
?>