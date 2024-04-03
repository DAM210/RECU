<?php

class Avion extends ElementoVolador{

    use mensaje;
    public function __construct(private string $nombre,private int $numAlas,private int $numMotores,private float $altitud,private float $velocidad,private string $companiaAerea,private string $fechaAlta,private float $altitudMaxima)
    {
        parent::__construct($nombre,$numAlas,$numMotores,$altitud,$velocidad);
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getCompania(){
        return $this->companiaAerea;
    }
    public function setCompania($companiaAerea){
        $this->companiaAerea=$companiaAerea;
    }

    public function volar($altitud){

        if($altitud>0 && $altitud<=$this->altitudMaxima){
            if($this->velocidad>=150){
                for($altitudActual=$this->getAltitud();$altitudActual<=$altitud;$altitudActual){
                    $this->setAltitud($altitudActual);
                    printf("Altitud: %d metros\n", $this->getAltitud());
                }
            }else{
                printf("Velocidad insuficiente: %d nudos\n", $this->getVelocidad());
            }
        }else{
            printf("Altitud incorrecta: %d metros\n", $altitud);
        }
    }

    public function mostrarInfo($mensaje){
        $mensaje="Nombre: ".$this->getNombre().". Nº alas: ".$this->getNumAlas().". Nº motores: ".$this->getNumMotores().". Altitud: ".$this->getAltitud().". Velocidad: ".$this->getVelocidad().". Compañia aérea: ".$this->companiaAerea.". Fecha de alta: ".$this->fechaAlta.".</br></br>";
        return $mensaje;
    }
}
?>