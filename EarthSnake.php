<?php

include_once("VirtualPet.php");
class EarthSnake extends VirtualPet{

    function __construct($n, $c, $i){
        parent::__construct($n, "EarthSnake", $c, "snd/earth-snake.ogg");
        $this->setIcon($i);
    }

}

?>