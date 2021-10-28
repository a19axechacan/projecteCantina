<?php


$idSeleccionada = $_POST["selectedItem"];


$menuFile = fopen("../menu.json", "r");
$menuRead = fread($menuFile, filesize("../menu.json"));
fclose($menuFile);
$arrayMenus = json_decode($menuRead, true);



foreach ($arrayMenus as $menu){
    foreach ($menu as $menuElement){
        if($menuElement["id"]==$idSeleccionada){
            $menuElement["id"]=-1;
        }
    }
}






print_r($arrayMenus);


