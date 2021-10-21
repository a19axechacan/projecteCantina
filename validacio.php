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


    <header>
        <div class="header-container">
            <div><img id="logo" src="css\logo.png" width="100px" height="100px"></div> 
            <div id="C">
                <p>CANTINA</p>  
                <p>INSTITUT</p>
                <p>PEDRALBES</p>
            </div>
            <div id="M">
                <a href="menu.php"><img id="I" src="css\bolsa.jpg" width="82px" height="82px"></a>
                <p id="T">Menú</p>
            </div>
        </div>
    </header>

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

            $llistahidden .= "<input type='hidden' name = ".$elemento['id']. " value = '".$elemento['id']. $elemento["nom"]. "  quantitat: ". $elemento["quantitat"]. " preu: ". $elemento["preuoriginal"]."'/>";

            $preciototal += $elemento["preu"];

        }


        $llista = "<div id='llista'>". $llistaul. $llistahidden. "</div>";

        $form =    "<form method='POST' action='finalitzacio.php' name = 'dades'>".
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

      <footer>
        <div class="footer-container">
            <div id="email">
                <p>Contáctanos:</p>
            </div>
            <div id="email">
                <p>a20servilrac@inspedralbes.cat</p>
                <p>a17chetrupos@inspedralbes.cat</p>
                <p>a19axechacan@inspedralbes.cat</p>
            </div>
        </div>
    </footer>

</html>