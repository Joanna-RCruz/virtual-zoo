<?php

include_once("AbstractUtils.php");
include_once("VirtualPet.php");
include_once("BlueSeeker.php");
include_once("EarthSnake.php");
include_once("Mobun.php");
include_once("RedFlower.php");
include_once("ToxicFrog.php");
session_start();

class Utils extends AbstractUtils{
    static function getCurrentPet(){
        foreach($_SESSION["pets"] as $serialPet){
            $tmp[] = unserialize($serialPet);
        }
        return $tmp[$_SESSION["currentPet"]];
    }

    static function changeCurrentPet($index){
        $_SESSION["currentPet"] = $index;
    }

    static function createPet($name, $type, $calories){
        switch($type){
            case "BlueSeeker":
                $_SESSION["pets"][] = serialize(new BlueSeeker($name, $calories, "res/blue-seeker.png"));
                break;
            
            case "EarthSnake":
                $_SESSION["pets"][] = serialize(new EarthSnake($name, $calories, "res/earth-snake.png"));
                break;
            
            case "Mobun":
                $_SESSION["pets"][] = serialize(new Mobun($name, $calories, "res/mobun.png"));
                break;
            
            case "RedFlower":
                $_SESSION["pets"][] = serialize(new RedFlower($name, $calories, "res/red-flower.png"));
                break;
            
            case "ToxicFrog":
                $_SESSION["pets"][] = serialize(new ToxicFrog($name, $calories, "res/toxic-frog.png"));
                break;
            
            default:
                break;
        }
    }

    static function searchPet($name){
        foreach($_SESSION["pets"] as $index => $pet){
            $pet = unserialize($pet);
            if($pet->getPetName() == $name) return $index;
        }
        return null;
    }
}

?>