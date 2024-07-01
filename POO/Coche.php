<?php 

class Coche {

    private $matricula;
    private $modelo;
    private $color;
    private $puertas;

    public function __construct($matricula, $modelo, $color, $puertas)
    {
        $this->matricula=$matricula;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->puertas = $puertas;
    }

    public function arrancarCoche(){
        echo "El coche {$this->modelo} esta encendido";
    }

    public function pararCoche(){
        echo "El coche {$this->modelo} esta parado";
    }

    public function getmatricula(){
        return $this->matricula;
    }
    public function getmodelo(){
        return $this->modelo;
    }
    public function getcolor(){
        return $this->color;
    }
    public function getpuertas(){
        return $this->puertas;
    }
    public function setmatricula(){
       $this->matricula;
    }
    public function setmodelo(){
        $this->modelo;
     }
     public function setcolor(){
        $this->color;
     }
     public function setpuertas(){
        $this->puertas;
     }

}



?>