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
<<<<<<< HEAD:admin/addMenuItem.php
    "imatge"=>"css/menu/150.png",
=======
    "imatge"=>"$target_file",
>>>>>>> a0602588b06b49f2b877683b571cca9d03d9c143:admin/addMenuElement.php
    "preu"=> floatval($_POST["preuProducte"])
);

do {
    $novaId = rand(0,999);
    $producteNou["id"]=$novaId;
} while (repeatedId($arrayMenus, $novaId)==true);
<<<<<<< HEAD:admin/addMenuItem.php
echo $nouProducteHorari;
if($nouProducteHorari== "dia"   ){
=======

if($nouProducteHorari== "dia"){
>>>>>>> a0602588b06b49f2b877683b571cca9d03d9c143:admin/addMenuElement.php
    array_push($arrayMenus["dia"],$producteNou);
}else{
    array_push($arrayMenus["tarde"],$producteNou);
}

$jsonMenu = json_encode($arrayMenus, JSON_UNESCAPED_UNICODE);


if(file_put_contents("../menu.json", $jsonMenu)!=false  && move_uploaded_file($_FILES["foto"]["tmp_name"], "../".$target_file) ){
  //  header("Location: /projecteCantina/admin/adminMenu.php");
    echo $target_file;
}



$filename= "../menu.json";
touch($filename);
$file = fopen($filename, "w");
fwrite($file,$jsonMenu);
fclose($file);







