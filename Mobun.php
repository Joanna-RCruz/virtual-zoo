<?php

include_once("VirtualPet.php");
class Mobun extends VirtualPet{

    function __construct($n, $c, $i){
        parent::__construct($n, "Mobun", $c, "snd/mobun.ogg");
        $this->setIcon($i);
    }

}

?>