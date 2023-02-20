<?php

include_once("VirtualPet.php");
class ToxicFrog extends VirtualPet{

    function __construct($n, $c, $i){
        parent::__construct($n, "ToxicFrog", $c, "snd/toxic-frog.ogg");
        $this->setIcon($i);
    }

}

?>