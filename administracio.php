<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <link href="admin.css" rel="stylesheet" type="text/css">
    <title>Menu</title>
    <script src="js/administracio.js"></script>

    <?php
    include("header.php");
    ?>

</head>
<body>
<div class="cuerpo">
    <h1>menu</h1>









    <?php





contarjsons();





    function contarjsons(){


        $divs = "";



        $i = 0;


        foreach(glob("comandesjson".'/*.*') as $file) {

            $dia_com = substr($file, 13, -5);


            $divs .= "<div class='diacomanda' id = '$file'><button id = '$dia_com' onclick='cambiapagina($dia_com)'>Dia $dia_com</button></div>";

            $i++;
            echo $file;

        }


        echo $divs;

    }


    function busca($nombre_fichero){



        if (file_exists($nombre_fichero)) {
            echo "El fichero $nombre_fichero existe";
        } else {
            echo "El fichero $nombre_fichero no existe";
        }

    }






    
    ?>

</div>
</body>

    <?php
    include("footer.php");
    ?>

</html>