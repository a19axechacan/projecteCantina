<?php


$producteActivat = explode("-", $_POST["selectedProduct"])[0];
$producteId = explode("-", $_POST["selectedProduct"])[1];
$menuFile = file_get_contents("../menu.json");

echo "Actualment: " . $producteActivat;
echo "<br>";


activarDesactivarProducte($producteId, $producteActivat, $menuFile);


function activarDesactivarProducte($id, $activat, $menuFile)
{

    //Si el producte està activat li canviem aquest atribut a false i a l'inrevés.
    $menuArrays = json_decode($menuFile, true);
    foreach ($menuArrays as &$menu) {
        foreach ($menu as &$element) {
            if ($element["id"] == $id) {
                if ($activat == "true") {
                    $element["activat"] = "false";
                } else {
                    $element["activat"] = "true";
                }
            }
        }
    }
//Escrivim l'arxiu un altre cop
    if (file_put_contents("../menu.json", json_encode($menuArrays, JSON_UNESCAPED_UNICODE)) != false) {
        header("Location: /projecteCantina/admin/adminMenu.php");
    }


}


