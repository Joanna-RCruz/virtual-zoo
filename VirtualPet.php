<?php

include_once("Food.php");

class VirtualPet{
    private $petName;
    private $type;
    private $currentCalories;   //100.0 = cheio
                                //  0.0 = morto de fome
    private $icon;
    private $sound;

    function __construct($n, $t, $c, $s){
        $this->petName = $n;
        $this->type = $t;
        $this->currentCalories = $c;
        $this->sound = $s;
    }

    function eat(Food $food){
        if(get_class($food) == "Apple"){        //Se houver uma minhoca na maçã, reduza a
            if($food->getWormInApple()){        //qtde de cal em 50%.
                $this->currentCalories /= 2;
                return;
            }
        }

        $this->currentCalories += $food->getCalories();
        if($this->currentCalories > 100) $this->currentCalories = 100;
    }

    function hunger(){
        $this->currentCalories -= 5;
    }

    function setIcon($i){
        $this->icon = $i;
    }

    function getIcon(){
        return $this->icon;
    }

    function getPetName(){
        return $this->petName;
    }

    function getType(){
        return $this->type;
    }

    function getSound(){
        return $this->sound;
    }

    function getCurrentCalories(){
        return $this->currentCalories;
    }
}

?>