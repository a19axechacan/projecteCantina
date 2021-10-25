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
    include("header.php");
    ?>

</head>
<body>
    <div class="cuerpo">
        <h1>Comanda confirmada</h1>
           </div>



    <?php

    setcookie("compraRealitzada", true,
        ['expires'=>strtotime('today 23:59'),
            'path'=>'/',
            'samesite'=> 'Strict'
        ]
    );

     dibuixacomanda();

    exportacomanda($_SESSION["compra"]);


    function dibuixacomanda()
    {

        $divtext = "";

        $nom = $_POST["nombre"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $cosaspedidas = "";
        $textoli = "";
        $total = $_POST["total"];
        print_r($_SESSION["compra"]);

        $jsonCompra = json_decode($_SESSION["compra"],true);



        foreach ($jsonCompra as $item){
            $textoli .= "<li>" . $item["nom"].": ".$item["quantitat"]  ." unitat/s</li>";
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

    function exportacomanda($text){

       $arrayText= json_decode($text, true);
       print_r($arrayText);
       $arrayText["id"]= "comanda1";
        print_r($arrayText);
       $text= json_encode($arrayText);

        $filename =  "comandesjson/". date("d-m-Y") . ".json";
        $file = "";
        $compra="";

        if(file_exists($filename) == true){
            echo "el fichero existe";
            $file = fopen($filename, "r");
            $compra=  json_decode(fread($file, filesize($filename)),true);
            fclose($file);
            $compraActualitzada =array_push($compra["comandes"], $arrayText);
            print_r($compra);
            $file = fopen($filename, "w");
            fwrite($file, json_encode($compra));
            fclose($file);

        }

        else {
            echo  "El fichero no existe";
            touch($filename);
            $file = fopen($filename, "w");
            fwrite($file, "{\"comandes\":[".$text."]}");
            fclose($file);


        }
        $file = fopen($filename, "r");
        $compra=  fread($file, filesize($filename));
        fclose($file);



    }


    ?>







</body>

    <?php
    include("footer.php");
    ?>

</html>