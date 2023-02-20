<?php

include_once("VirtualPet.php");
class VirtualZoo{

    private $cages;

    function __construct($c){
        $this->cages = $c;
    }

    function sendSound(VirtualPet $pet){
        echo("
            <script>play();</script>
        ");
    }

    function getPet($index){ //Busca o pet no vetor pelo índice
        if(isset($this->cages[$index])) return $this->cages[$index];
        else return null;
    }

    function getCages(){
        return $this->cages;
    }

}

?>