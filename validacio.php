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
    
    


    <form method="POST" action="validar.php" name = "dades" onsubmit = "return validate()" onsubmit = "">
        <table>
          <tr>
            <td align="LEFT">Nom:</td>
            <td align="RIGHT" colspan="3"><input type="TEXT" name="nombre" size="25" required></td>
          </tr>
          <tr>
            <td align="LEFT">Telefon:</td>
            <td align="RIGHT" colspan="3"><input type="TEXT" name="telefono" size="25"></td>
          </tr>

          <tr>
            <td align="LEFT">email:</td>
            <td align="RIGHT" colspan="3"><input type="TEXT" name="email" size="25"></td>
          </tr>

            <tr>
                <td align="RIGHT" colspan="3"><input type="hidden" name="json" size="25" value="" ></td>
            </tr>
          </Table>

        <input TYPE="SUBMIT" value="Envia" >
     </form>

    





    <a href="menu.php">canviar compra</a><br>
    <a href="finalitzacio.php">comprar</a>



    <?php 

    $array = array();
    $array = leer();
    echo "mi array ". $array;

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
            echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
            if(htmlspecialchars($value) != 0){

                $cosascompradas[$key] = $value;

                echo "cosas compradas key ".$key;
                $aux = $cosascompradas[$key] ;
                $auxval = $value;

                foreach ($menuDia as $elemento) {
                    if($elemento["id"] == $key){

                        $arrayfinal[$key] = $elemento["preu"]* $auxval;
                    }

                    }

                foreach ($menuTarde as $elemento) {
                    if($elemento["id"] == $key){

                        $arrayfinal[$key] = $elemento["preu"]* $auxval;
                    }

                }

                }
            }
        print_r($arrayfinal);



        $arraydefinitivo = array();

        foreach ($arrayfinal as $key => $value) {


            for($i= 0; $i< count($menuDia); $i++){

                if($key == $menuDia[$i]["id"]){
                    echo " hola ";

                    $arraydefinitivo[$menuDia[$i]["nom"]] = $value;


            }

                for($i= 0; $i< count($menuTarde); $i++){

                    if ($key == $menuTarde[$i]["id"]){
                        $arraydefinitivo[$menuTarde[$i]["nom"]] = $value;



                    }



            }



            }

        }


        print_r($arraydefinitivo);

        $gasto = 0;
    foreach ($arraydefinitivo as $key => $value) {

        $gasto += $value;



        }

        print_r($gasto);


        $div = "";

        foreach ($arraydefinitivo as $key => $value) {





        }


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

        $arraydefinitivo = array();
        $menuFile = fopen("menu.json", "r");

        $menuRead = fread($menuFile, filesize("menu.json"));

        fclose($menuFile);


        $json = json_decode($menuRead, true);

        $menuDia = $json["dia"];
        $menuTarde = $json["tarde"];


        $i = 0;
        foreach ($array as $key => $value) {
            if($key == $menuDia[$i]["id"]){

                $arraydefinitivo[$menuDia[$i]["nom"]] = $value;


                }
            elseif ($key == $menuTarde[$i]["id"]){
                                $arraydefinitivo[$menuTarde[$i]["nom"]] = $value;



            }


                }


        print_r($arraydefinitivo);

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