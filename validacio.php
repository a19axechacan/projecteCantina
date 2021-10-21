<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <title>Validacio</title>
    <script src="js/validate.js"></script>
    <link href="validacio.css" rel="stylesheet" type="text/css">


    <?php
    include ("header.php")
    ?>

</head>
<body>

    <div class="cuerpo">
      <h1>Validacio de la compra</h1>

    <a href="menu.php">canviar compra</a><br>
    <a href="finalitzacio.php">comprar</a>




        <?php

    $array = array();
    $array = leer();
    imprimicion($array);








    function leer (){
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

            if(htmlspecialchars($value) != 0){

                $cosascompradas[$key] = $value;

                $aux = $cosascompradas[$key] ;
                $auxval = $value;

                foreach ($menuDia as $elemento) {
                    if($elemento["id"] == $key){

                        $arrayfinal[$key] = [
                            "preu" =>   $elemento["preu"]* $auxval,
                            "preuoriginal" => $elemento["preu"],
                            "quantitat" =>    $value,
                            "nom" => $elemento["nom"],
                              "id" => $elemento["id"]


                        ];
                    }

                    }

                foreach ($menuTarde as $elemento) {
                    if($elemento["id"] == $key){

                        $arrayfinal[$key] = [
                            "preu" =>   $elemento["preu"]* $auxval,
                            "preuoriginal" => $elemento["preu"],
                            "quantitat" =>    $value,
                            "nom" => $elemento["nom"],
                            "id" => $elemento["id"]

                        ];
                    }

                }

                }
            }
        //print_r($arrayfinal);







        $gasto = 0;
        /*
    foreach ($arraydefinitivo as $key => $value) {

        $gasto += $value;



        }

        print_r($gasto);


        $div = "";

        foreach ($arraydefinitivo as $key => $value) {





        }*/


        /*

                for($i=count($json["dia"]); $i>0; $i--){
                    $precio = $json["dia"][$i]["preu"];
                   echo  $cosascompradas[$i][$key];



                    echo $precio;
                }



                for($i=count($json["tarde"]); $i>0; $i--){
                    $precio = $json["tarde"][$i]["preu"];

                    echo $precio;
                }
        */

        return $arrayfinal;
    }


    function imprimicion(&$array){


        $llista = "";

        $llistaul = "";
        $llistahidden = "";

        $preciototal = 0;

        $form = "";
    $totalapagar = "";





        foreach ($array as $elemento) {


            $llistaul .= " <li id =".$elemento['id'].">". $elemento["nom"]. "  quantitat: ". $elemento["quantitat"]. " preu: ". $elemento["preuoriginal"]. " € " .  "</li>";

            $llistajson = $_POST["jsoncompra"];
            $llistahidden .= "<input type='hidden' name = 'jsonpasar' value = $llistajson/>";

            $preciototal += $elemento["preu"];

        }


        $llista = "<div id='llista'>". $llistaul. $llistahidden. "</div>";

        $form =    "<form method='POST' action='finalitzacio.php' name = 'dades' onsubmit='validate()'>".
                    "<table>
          <tr>
            <td >Nom:</td>
            <td  colspan='3'><input type='TEXT' name='nombre' size='25' required></td>
          </tr>
          <tr>
            <td >Telefon:</td>
            <td  colspan='3'><input type='TEXT' name='telefono' size='25'></td>
          </tr>

          <tr>
            <td >email:</td>
            <td  colspan='3'><input type='TEXT' name='email' size='25'></td>
          </tr>
         <input type='hidden' name='total' size='25' value= $preciototal> 

        
         
          </Table>". $llista.    "<p id ='total' > Total: ". $preciototal . "€</p>".


            "<input TYPE='SUBMIT' value='Envia' >" .


            "</form>";

        echo $form;
    }



/*
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$json = $_GET["comanda"];*/




/*validacio($nombre, $email, $telefono, $json);
$obj = var_dump(json_decode($json,true));
print_r ($obj);*/







function validacio($nombre, $email, $telefono){

echo $nombre;


echo $email;
echo $telefono;

if($nombre == null){

    return false;

}
if($email){

    return false;
}

if($telefono){



}
}







function potscomprar($token){
    if($token == false){
        return true;
    }
    return false;
}



?>


</div>
</body>

<?php
include ("footer.php")
?>


</html>