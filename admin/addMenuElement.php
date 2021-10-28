<?php

function repeatedId($arrayMenus, $novaId): bool
{
    $repeated = false;
    foreach ($arrayMenus as $menu){
        foreach ($menu as $element ){
            if($novaId==$element["id"]){
                $repeated = true;
            }
        }
    }
    return $repeated;
}






$nouProducteHorari = $_POST["horariProducte"];


$menuFile = fopen("../menu.json", "r");
$menuRead = fread($menuFile, filesize("../menu.json"));
fclose($menuFile);
$arrayMenus = json_decode($menuRead, true);


$producteNou = array(
    "nom"=>utf8_encode($_POST["nomProducte"]),
    "descripció"=>utf8_encode($_POST["descProducte"]),
    "imatge"=>"css/menu/150.png",
    "preu"=> floatval($_POST["preuProducte"])
);





do {
    $novaId = rand(0,999);
    $producteNou["id"]=$novaId;
} while (repeatedId($arrayMenus, $novaId)==true);

if($nouProducteHorari== "dia"){
    array_push($arrayMenus["dia"],$producteNou);
}else{
    array_push($arrayMenus["tarde"],$producteNou);
}

$jsonMenu = json_encode($arrayMenus, JSON_UNESCAPED_UNICODE);


if(file_put_contents("../menu.json", $jsonMenu)!=false){
    header("Location: /projecteCantina/admin/adminMenu.php");
}



$filename= "../menu.json";
touch($filename);
$file = fopen($filename, "w");
fwrite($file,$jsonMenu);
fclose($file);







?>