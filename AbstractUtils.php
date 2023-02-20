<?php
//Classe abstrata contendo protótipos de funções comuns

abstract class AbstractUtils{
    abstract static function changeCurrentPet($index);
    abstract static function createPet($name, $type, $calories);
    abstract static function searchPet($name);
}


?>