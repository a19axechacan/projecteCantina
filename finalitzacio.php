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
    $comanda =  dibuixacomanda();

    exportacomanda($comanda);







    function dibuixacomanda()
    {

        $divtext = "";

        $nom = $_POST["nombre"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $cosaspedidas = "";
        $textoli = "";
        $total = $_POST["total"];


        $i = 0;
        foreach ($_POST as $key => $value) {

            if ($i >= 4) {
                $textoli .= "<li>" . $value . "</li>";

            }
            $i++;
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
                          <p id = 'total'> Total a pagar  $total</p>                         

                        </div>";

        echo $divtext;
        return $divtext;


    }

    function exportacomanda($text){
        $filename =  date("dmY") . ".json";
        $file = "";


        if(file_exists($filename) == true){


        }

        else {
            touch($filename);
            $file = fopen($filename, "w");
            fwrite($file, $text);


        }




    }


    ?>







</body>

    <?php
    include("footer.php");
    ?>

</html>