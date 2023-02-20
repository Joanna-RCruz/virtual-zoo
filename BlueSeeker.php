<?php

include_once("VirtualPet.php");
class BlueSeeker extends VirtualPet{

    function __construct($n, $c, $i){
        parent::__construct($n, "BlueSeeker", $c, "snd/blue-seeker.ogg");
        $this->setIcon($i);
    }

}

?>