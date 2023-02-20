<?php

include_once("Food.php");
class Apple extends Food{
    private $wormInApple;

    function __construct(){
        parent::__construct("Apple", 10);
        $this->wormInApple = false;
    }

    function setWormInApple($w){
        $this->wormInApple = $w;
        $this->calories = 0;
    }

    function getWormInApple(){
        return $this->wormInApple;
    }

}

?>