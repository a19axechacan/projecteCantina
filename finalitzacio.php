<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <link href="finalitzacio.css" rel="stylesheet" type="text/css">

    <title>Document</title>

    <?php
    include("assets/header.php");
    ?>

</head>
<body>
<div class="cuerpo">
    <h1>Comanda confirmada</h1>
</div>


<?php


//Aquesta funció pinta la comanda feta pel client i les seves dades
function dibuixaComanda($nom, $email, $telefono)
{

    $divtext = "";


    $cosaspedidas = "";
    $textoli = "";
    $total = $_SESSION["preuTotal"];


    $jsonCompra = json_decode($_SESSION["compra"], true);


    foreach ($jsonCompra as $item) {
        $textoli .= "<li>" . $item["nom"] . ": " . $item["quantitat"] . " unitat/s</li>";
    }


    $cosaspedidas = "<ul>" . $textoli . "</ul>";

    $divtext .= "<div id='dades'>    
                            <ul class='dadescli'>
                            <li>Nom del client: $nom</li>
                            <li>Email del client: $email</li>
                            <li>Telefon del client: $telefono</li>
                             <li>Coses demanades:</li>

                            " . $cosaspedidas . "
                        </ul>
                          <p id = 'total'> Total a pagar  $total €</p>                         

                        </div>";

    echo $divtext;


}



//Si el fitxer de comandes no existeix, es crea amb la primera comanda
//Si el fitxer ja existeix es torna a escriure el fitxer, però, afegint la nova comanda
//Totes les comandes estan escrites en format JSON
function exportaComanda($arrayJson)
{


    $text = json_encode($arrayJson);

    $filename = "admin/comandesjson/" . date("d-m-Y") . ".json";
    $file = "";
    $compra = "";

    if (file_exists($filename) == true) {

        $file = fopen($filename, "r");
        $compra = json_decode(fread($file, filesize($filename)), true);
        fclose($file);
        $compraActualitzada = array_push($compra["comandes"], $arrayJson);

        $file = fopen($filename, "w");
        fwrite($file, json_encode($compra));
        fclose($file);

    } else {

        touch($filename);
        $file = fopen($filename, "w");
        fwrite($file, "{admin\"comandes\":[" . $text . "]}");
        fclose($file);


    }
    $file = fopen($filename, "r");
    $compra = fread($file, filesize($filename));
    fclose($file);


}






//Creem la cookie "CompraRealitzada" que expirarà el mateix dia a les 23:59
//per tal de que es pugui tornar a fer una compra el dia següent
setcookie("compraRealitzada", true,
    ['expires' => strtotime('today 23:59'),
        'path' => '/',
        'samesite' => 'Strict'
    ]
);



//Recuperem les dades del client amb els POST
$nom = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
//Recuperem la compra amb SESSION, tot transformant-la en un array associatiu
$compra = json_decode($_SESSION["compra"], true);

//Dibuixem la comanda
dibuixaComanda($nom, $email, $telefono);
//Creem un array associatiu que posteriorment serà transformat a JSON per ser escrit en un fitxer
$jsonArrayComandes = [
    "nom" => $nom,
    "email" => $email,
    "telefon" => $telefono,
    "total"=>  $_SESSION["preuTotal"]
];


//Al array associatiu li afegirem un nou camp on estaran tots els productes comprats per un client en format JSON
$i=0;
$textCompra= "[";
foreach ($compra as $elementComprat) {

    if(++$i===count($compra)){
        $textCompra.="{\"".$elementComprat["id"]."\":{\"quantitat\":".$elementComprat["quantitat"]."}}";
    }else{
        $textCompra.="{\"".$elementComprat["id"]."\":{\"quantitat\":".$elementComprat["quantitat"]."}},";
    }

}
$textCompra.="]";

//Transformem textCompra en un JSON i l'incloem en el JSON associatiu
$jsonArrayComandes["comandes"] =json_decode($textCompra);

//Escrivim el json en el fitxer
exportaComanda($jsonArrayComandes);
?>


</body>

<?php
include("assets/footer.php");
?>

</html>