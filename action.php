<?php

include_once("Utils.php");

if($_GET["action"] == "change-pet"){
    Utils::changeCurrentPet($_GET["no"]);
}
elseif($_GET["action"] == "create-pet"){
    Utils::createPet($_GET["name"], $_GET["type"], 50.0);
    Utils::changeCurrentPet(Utils::searchPet($_GET["name"]));
}
elseif($_GET["action"] == "eat"){
    $currentPet = Utils::getCurrentPet();
    $currentPet->eat(new Food("", $_GET["calories"]));
    $index = Utils::searchPet($currentPet->getPetName());
    $_SESSION["pets"][$index] = serialize($currentPet);
}
echo("<script>window.location.replace('".$_SESSION['urlv'][0]."');</script>");


?>