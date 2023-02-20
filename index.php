<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>VirtualZoo</title>
    <link rel="stylesheet" href="style-sheet.css">
    
</head>
<body style="background-color: black;">

<script>
    function play(){
        var audio = document.getElementById("audio");
        audio.play();
    }
</script>

<?php

include_once("Utils.php");
include_once("VirtualPet.php");
include_once("VirtualZoo.php");
include_once("Food.php");
include_once("Apple.php");
include_once("Sushi.php");
include_once("IceCream.php");
include_once("BlueSeeker.php");
include_once("EarthSnake.php");
include_once("Mobun.php");
include_once("RedFlower.php");
include_once("ToxicFrog.php");

//session_start();
//session_destroy();

$url = 'http://localhost'.$_SERVER['REQUEST_URI'];

if(!isset($_SESSION['urlv'])){  //Código de inicialização, é executado apenas uma vez
    $_SESSION['urlv'] = explode("?", $url);

    $_SESSION["currentPet"] = 0;

    Utils::createPet("Gogo", "RedFlower", 75);
    Utils::createPet("", "ToxicFrog", 25);

}

//Código a ser executado toda vez que a página carrega
foreach($_SESSION["pets"] as $pet){
    $pets[] = unserialize($pet);
}

$currentPet = Utils::getCurrentPet();
$currentPet->hunger();
$index = Utils::searchPet($currentPet->getPetName());
$_SESSION["pets"][$index] = serialize($currentPet);

$zoo = new VirtualZoo($pets);
for($i=0;$i<4;$i++){
    switch(rand(1,3)){
        case 1:
            $tmp = new Apple();
            break;
        
        case 2:
            $tmp = new IceCream();
            break;
    
        case 3:
            $tmp = new Sushi();
            break;
    }
    if($tmp->getName() == "Apple"){
        if(rand(1,10) <= 2){
            $tmp->setWormInApple(true);
        }
    }
    $foods[] = $tmp;
}
unset($i, $tmp);

if(isset($_GET["action"])){
    
    if($_GET["action"] == "change-pet"){
        echo("
            <div class='window bordered-box' style='z-index: 3;'>
                <a class='close-button' href='".$_SESSION["urlv"][0]."'>
                    <img src='res/close-btn.png' width='24px'>
                </a>
                <h1>Select your pet:</h1>
                <p>
        ");
        foreach($zoo->getCages() as $petindex => $pet){
            echo("
                    <a href='action.php/?action=change-pet&no=$petindex'>".$pet->getPetName()."</a><br>
            ");
        }
        echo("
                    <br>
                    <a href='".$_SESSION["urlv"][0]."?action=create-pet"."'>Create New Pet</a>
                </p>
            </div>
        ");
    }

    if($_GET["action"] == "create-pet"){
        echo("
            <div class='window bordered-box' style='z-index: 3;'>
                <a class='close-button' href='".$_SESSION["urlv"][0]."'>
                    <img src='res/close-btn.png' width='24px'>
                </a>
                <h1>Create a new pet:</h1>
                <form action='action.php' method='get'>
                    <p>
                        <label>Name:</label>
                        <input name='name'/ type='text'><br><br>

                        <label>Type:</label>
                        <select name='type'>
                            <option value='BlueSeeker'>Blue Seeker</option>
                            <option value='EarthSnake'>Earth Snake</option>
                            <option value='Mobun'>Mobun</option>
                            <option value='RedFlower'>Red Flower</option>
                            <option value='ToxicFrog'>Toxic Frog</option>
                        </select>

                        <!-- O pulo do gato -->
                        <select name='action' style='visibility: hidden;'>
                            <option value='create-pet'></option>
                        </select><br><br>

                        <input type='submit' value='Create'><br>
                    </p>
                </form>
            </div>
        ");
    }
}

?>
    <audio id="audio" src="<?php echo(Utils::getCurrentPet()->getSound());?>"></audio>

    <div class="bordered-box" style="
        min-width: 15%;
        min-heigth: 20%;
        position: absolute;
        top: 10px;
    ">
        <p>
            Name: <?php echo(Utils::getCurrentPet()->getPetName()); ?> <br>
            Hunger: <?php echo(Utils::getCurrentPet()->getCurrentCalories()); ?>% <br>
            <input type="button" value="Play Sound" onclick="play()"> <br>
            <a href="<?php echo($_SESSION["urlv"][0]); ?>?action=change-pet">Change Pet</a>
        </p>
    </div>

    <div class="bordered-box" style="
        width: 40%;
        position: absolute;
        bottom: 0px;
        left:50%;
        transform: translate(-50%, 0px);
    ">
        <?php
        
        foreach($foods as $food){
            echo("<a href='action.php?action=eat&calories=".$food->getCalories()."'>");

            switch($food->getName()){
                case "Apple":
                    echo("<img width='25%' src='res/apple.png'>");
                    break;

                case "Ice Cream":
                    echo("<img width='25%' src='res/ice-cream.png'>");
                    break;

                case "Sushi":
                    echo("<img width='25%' src='res/sushi.png'>");
                    break;
            }
            echo("</a>");
        }

        ?>
    </div>
    
    <div>
        <img class="background" src="res/room-bg.jpg" alt="Background" style="
            min-width: 110%;
        ">
    </div>

    <div>
        <img class="pet-image" width="20%" src="<?php echo(Utils::getCurrentPet()->getIcon()); ?>" alt="Pet">
    </div>
    
</body>
</html>
