<?php
trait mensaje{
    public function mostrarInfo($mensaje){
        return $mensaje;
    }
}
class Helicoptero extends ElementoVolador{

    use mensaje;
    public function __construct(private string $nombre,private int $numAlas,private int $numMotores,private float $altitud,private float $velocidad,private string $propietario,private int $numRotores)
    {
        parent::__construct($nombre,$numAlas,$numMotores,$altitud,$velocidad);
    }

    public function getNRotores(){
        return $this->numRotores;
    }

    public function setNRotores($numRotores){
        $this->numRotores=$numRotores;
    }

    public function volar($altitud){
        if($altitud<(100*$this->numRotores)){
            
                for($altitudActual=$this->getAltitud();$altitudActual<=$altitud;$altitudActual++){
                    $this->setAltitud($altitudActual);
                    printf("Altitud: %d metros\n", $this->getAltitud());
                }
            }else{
            printf("Altitud incorrecta: %d metros\n", $altitud);
            }
    }

    public function mostrarInfo($mensaje){
        $mensaje= "Nombre: ".$this->getNombre().". Nº alas: ".$this->getNumAlas().". Nº motores: ".$this->getNumMotores().". Altitud: ".$this->getAltitud().". Velocidad: ".$this->getVelocidad().". Propietario: ".$this->propietario.". Nº rotores: ".$this->numRotores.".</br></br>";
        return $mensaje;
    }
}
?>