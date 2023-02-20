<?php

class Food{
    private $calories;
    private $name;

    function __construct($n, $c){
        $this->calories = $c;
        $this->name = $n;
    }

    function getCalories(){
        return $this->calories;
    }

    function getName(){
        return $this->name;
    }
}

?>