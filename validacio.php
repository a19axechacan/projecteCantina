<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <title>Validacio</title>
    <script src="js/validate.js"></script>
    <link href="validacio.css" rel="stylesheet" type="text/css">
    <script src="sweetalert/docs/assets/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sweetalert/src/sweetalert.css">


    <?php
    include("header.php")
    ?>

</head>
<body>

<div class="cuerpo">
    



    <?php

    $llista = "";

    $llistaul = "";
    $llistahidden = "";

    $preciototal = 0;

    $form = "";
    $totalapagar = "";

    $arrayCompra = array();
    $arrayCompra = leer();

    $llistaJson = json_encode($arrayCompra);


    $_SESSION["compra"]=$llistaJson;

    imprimicion($arrayCompra, $preciototal, $llista, $llistaJson);


    function leer()
    {
        $menuFile = fopen("menu.json", "r");

        $menuRead = fread($menuFile, filesize("menu.json"));

        fclose($menuFile);


        $json = json_decode($menuRead, true);

        $menuDia = $json["dia"];
        $menuTarde = $json["tarde"];

        $arrayfinal = array();
        $i = 0;
        $cosascompradas = array();
        foreach ($_POST as $key => $value) {

            if (htmlspecialchars($value) != 0) {

                $cosascompradas[$key] = $value;

                $aux = $cosascompradas[$key];
                $auxval = $value;

                foreach ($menuDia as $elemento) {
                    if ($elemento["id"] == $key) {

                        $arrayfinal[$key] = [
                            "preu" => $elemento["preu"] * $auxval,
                            "preuoriginal" => $elemento["preu"],
                            "quantitat" => $value,
                            "nom" => $elemento["nom"],
                            "id" => $elemento["id"]


                        ];
                    }

                }

                foreach ($menuTarde as $elemento) {
                    if ($elemento["id"] == $key) {

                        $arrayfinal[$key] = [
                            "preu" => $elemento["preu"] * $auxval,
                            "preuoriginal" => $elemento["preu"],
                            "quantitat" => $value,
                            "nom" => $elemento["nom"],
                            "id" => $elemento["id"]

                        ];
                    }

                }

            }
        }


        return $arrayfinal;
    }


    function imprimicion(&$array, &$preciototal, &$llista, &$llistaJson)
    {


        $llistaul = "";
        $llistahidden = "";
        $preciototal = 0;


        foreach ($array as $elemento) {


            $llistaul .= " <li id =" . $elemento['id'] . ">" . $elemento["nom"] . "  quantitat: " . $elemento["quantitat"] . " preu: " . $elemento["preuoriginal"] . " € " . "</li>";



            $preciototal += $elemento["preu"];

        }


        $llista = "<div id='llista'>" . $llistaul . $llistahidden . "</div>";

    }


    ?>



    <div class="validacio-container">
        <div class="tiquet-container">
            <div id="continuar">
                <h3>La teva compra</h3>
            </div>
            <div id="formulari">
                <form method='POST' action='finalitzacio.php' name='dades' >
                <table>
                    <tr>
                        <td>Nom:</td>
                        <td colspan='3'><input type='TEXT' name='nombre' size='25' required></td>
                    </tr>
                    <tr>
                        <td>Telefon:</td>
                        <td colspan='3'><input type='TEXT' name='telefono' size='25' required></td>
                    </tr>
                    <tr>
                        <td>email:</td>
                        <td colspan='3'><input type='TEXT' name='email' size='25' required></td>
                    </tr>
                    <input type='hidden' name='total' size='25' value= <?php echo $preciototal ?>>
                </Table><?php echo $llista ?> <p id ='total' > Total:  <?php echo $preciototal ?> €</p>
                
            </div>
            <div id="enviar">
                <input TYPE='SUBMIT' value='Envia' id='enviaform' onclick="return validar()" >
                </form>  
            </div>
            
                
        </div>
        <div class="formulari-container">
            <div id="continuar">
                <h3>Omple aquests camps per continuar amb la compra</h3>
            </div>
            <div id="formulari">
                <form method='POST' action='finalitzacio.php' name='dades' >
                <table>
                    <tr>
                        <td>Nom:</td>
                        <td colspan='3'><input type='TEXT' name='nombre' size='25' required></td>
                    </tr>
                    <tr>
                        <td><br>Telefon:</td>
                        <td colspan='3'><br><input type='TEXT' name='telefono' size='25' required></td>
                    </tr>
                    <tr>
                        <td><br>Email:</td>
                        <td colspan='3'><br><input type='TEXT' name='email' size='25' required></td>
                    </tr>
                </Table>
                
            </div>
            <div id="enviar">
                <input TYPE='SUBMIT' value='Comprar' id='enviaform' onclick="return validar()" >
                </form>  
            </div>
    </div>    


    
    








</div>
</body>

<?php
            include("footer.php")
            ?>


</html>