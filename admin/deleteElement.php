<?php


$selectedId = $_POST["selectedId"];
$borrar = 123;

$menuFile = file_get_contents("../menu.json");

$menuArrays = json_decode($menuFile, true);
foreach ($menuArrays as &$menu) {
    for ($i = 0; $i < count($menu); $i++) {
        if ($menu[$i]["id"] == $selectedId) {
            unset($menu[$i]);
        }
    }
}


if(file_put_contents("../menu.json",json_encode($menuArrays, JSON_UNESCAPED_UNICODE))!=false){
    header("Location: /projecteCantina/admin/adminMenu.php");
}

