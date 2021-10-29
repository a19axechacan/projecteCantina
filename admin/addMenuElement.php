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

$target_dir = "css/menu/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$producteNou = array(
    "nom"=>utf8_encode($_POST["nomProducte"]),
    "descripció"=>utf8_encode($_POST["descProducte"]),
    "imatge"=>"$target_file",
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


if(file_put_contents("../menu.json", $jsonMenu)!=false  && move_uploaded_file($_FILES["foto"]["tmp_name"], "../".$target_file) ){
   header("Location: /projecteCantina/admin/adminMenu.php");
  //  echo $target_file;
}



$filename= "../menu.json";
touch($filename);
$file = fopen($filename, "w");
fwrite($file,$jsonMenu);
fclose($file);







?>