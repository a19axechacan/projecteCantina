<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../capçalera.css" rel="stylesheet" type="text/css">
    <link href="admin.css" rel="stylesheet" type="text/css">
    <title>Document</title>

    <?php
    include("../assets/header.php");

    function productInfo($arrayMenus, $id, $producte): string
    {
        foreach ($arrayMenus as $menu){
            foreach ($menu as $menuElement) {
                if ($menuElement["id"] == $id) {
                    $productInfoText = "<div>Producte:" . $menuElement["nom"] . " x " . $producte["quantitat"] . " unitat/s</div>";
                }
            }
        }
        return $productInfoText;
    }


    $menuFile = fopen("../menu.json", "r");
    $menuRead = fread($menuFile, filesize("../menu.json"));
    fclose($menuFile);
    $arrayMenus = json_decode($menuRead, true);


    $filename = "comandesjson/" . date("d-m-Y") . ".json";
    $comandesFile = fopen($filename, "r");
    $comandes = fread($comandesFile, filesize($filename));
    fclose($comandesFile);
    $arrayComandes = json_decode($comandes, true);



    ?>

</head>
<body>

<div class="cuerpo">
    <h1>Administració</h1>
    <div class="comandes-container">
        <?php

        foreach ($arrayComandes["comandes"] as $comanda) {
            $text = "<div class='comanda'>
            <div class='container'>
                <h4><b>" . $comanda["email"] . "</b></h4>";

            foreach ($comanda["comandes"] as $elements) {
                foreach ($elements as $idProducte => $producte) {

                        $text .= productInfo($arrayMenus, $idProducte, $producte);

                }
            }
            $text .= "<p></p><p><b>Total: " . $comanda["total"] . "€</b></p>
            </div>
        </div>";

            echo $text;
        }

        ?>
    </div>
</div>
    


</body>

<?php
include("../assets/footer.php");
?>

</html>