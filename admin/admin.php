<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="projecteCantina/css/capçalera.css" rel="stylesheet" type="text/css">
    <link href="admin.css" rel="stylesheet" type="text/css">
    <link href="../normalize.css" rel="stylesheet" type="text/css">
    <title>Document</title>

    <?php
    include("../assets/header.php");


    //productInfo retorna una string d'un div ben format amb la informació comprobada del menu original
    function productInfo($arrayMenus, $id, $producte): string
    {
        foreach ($arrayMenus as $menu) {
            foreach ($menu as $menuElement) {
                if ($menuElement["id"] == $id) {
                    $productInfoText = "<div>Producte: " . $menuElement["nom"] . " x " . $producte["quantitat"] . " unitat/s</div>";
                }
            }
        }
        return $productInfoText;
    }


    function getMissatgeError()
    {

        return "<div class='cuerpo'> 
        <div id='O'>
        <a><img src='../css/error.png' width='150px' height='150px'></a> 
            <h1>Sembla que encara no hi ha cap comanda</h1>
            <h2>Totes les comandes apareixeran aquí</h2>
        </div>
        
    </div>
   ";
    }


    //Obrim el menu originial complet i el transformem en array associatiu
    $menuFile = fopen("../menu.json", "r");
    $menuRead = fread($menuFile, filesize("../menu.json"));
    fclose($menuFile);
    $arrayMenus = json_decode($menuRead, true);


    //Si existeix el fitxer de les comandes del dia les guardem en l'array $arrayComandes
    //sino existeix el fitxer mostrem un missatge d'error
    $filename = "comandesjson/" . date("d-m-Y") . ".json";
    if (file_exists($filename)) {
        $comandesFile = fopen($filename, "r");
        $comandes = fread($comandesFile, filesize($filename));
        fclose($comandesFile);
        $arrayComandes = json_decode($comandes, true);
    }


    ?>

</head>
<body>

<div class="cuerpo">

    <div class="comandes-container">
<?php

//Si el fitxer existeix s'utilitza l'array anteriorment creat per imprimir la informació de cada comanda
//Sino s'imprimeix un missatge d'error

if (file_exists($filename)) {
    foreach ($arrayComandes["comandes"] as $comanda) {
        $text = " <div class='comanda'>
        <div class='container'>
            <h4><b>" . $comanda["email"] . "</b></h4>";


        foreach ($comanda["comandes"] as $elements) {
            foreach ($elements as $idProducte => $producte) {
                $text .= productInfo($arrayMenus, $idProducte, $producte);
            }
        }
        $text .= "<p><b>Total: " . $comanda["total"] . "€</b></p>
            </div>
            </div>";
        echo $text;
    }
}



?>
        </div>
    <?php
    if(!file_exists($filename)){
        echo getMissatgeError();
    }
    ?>
    <div id=modificarTicket>
        <form action="adminMenu.php">
        <input type="submit" id="botonModificarTicket" value="Modificar ticket" /></form>
    </div>
</div>
</body>

<?php
include("../assets/footer.php");
?>

</html>