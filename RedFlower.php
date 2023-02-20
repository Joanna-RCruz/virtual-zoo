<?php

include_once("VirtualPet.php");
class RedFlower extends VirtualPet{

    function __construct($n, $c, $i){
        parent::__construct($n, "RedFlower", $c, "snd/red-flower.ogg");
        $this->setIcon($i);
    }

}

?>