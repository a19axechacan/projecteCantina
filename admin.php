<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <title>Document</title>

    <?php
    include("header.php");
    ?>

</head>
<body>

<h1>Administració</h1>


<div class="comandes-container">
    <?php
    $menuFile = fopen("menu.json", "r");
    $menuRead = fread($menuFile, filesize("menu.json"));
    fclose($menuFile);
    $json = json_decode($menuRead, true);
    $menuDia = $json["dia"];
    $menuTarde = $json["tarde"];


    $filename = "comandesjson/" . date("d-m-Y") . ".json";
    $comandesFile = fopen($filename, "r");
    $comandes = fread($comandesFile, filesize($filename));
    fclose($comandesFile);
    $arrayComandes = json_decode($comandes, true);
    foreach ($arrayComandes["comandes"] as $comanda) {
        $text = "<div class='comanda'>
        <div class='container'>
            <h4><b>" . $comanda["email"] . "</b></h4>";


        foreach ($comanda["comandes"] as $elements) {
            foreach ($elements as $idProducte => $producte) {

                foreach ($menuDia as $elementMenuDia) {
                    if ($elementMenuDia["id"] == $idProducte) {
                        $text .= "<div>Producte:" . $elementMenuDia["nom"] . "" . " x " . $producte["quantitat"] . " unitat/s</div>";
                    }
                }

                foreach ($menuTarde as $elementMenuTarde) {
                    if ($elementMenuTarde["id"] == $idProducte) {
                        $text .= "<div>Producte:" . $elementMenuTarde["nom"] . " x " . $producte["quantitat"] . " unitat/s</div>";
                    }
                }

            }
        }

        $text .= "<p><b>Total: " . $comanda["total"] . "€</b></p>
        </div>
    </div>";


        echo $text;
    }


    ?>

</div>


</body>

<?php
include("footer.php");
?>

</html>