<?php

include_once("Food.php");
class Sushi extends Food{

    function __construct(){
        parent::__construct("Sushi", 5);
    }

}

?>