<?php

include_once("Food.php");
class IceCream extends Food{

    function __construct(){
        parent::__construct("Ice Cream", 15);
    }

}

?>