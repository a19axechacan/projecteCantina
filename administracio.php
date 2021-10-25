<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <link href="admin.css" rel="stylesheet" type="text/css">
    <title>Menu</title>
    <script src="menu.js"></script>

    <?php
    include("header.php");
    ?>

</head>
<body>
<div class="cuerpo">
    <h1>menu</h1>









    <?php
/*

    if(empty($_COOKIE["compraRealitzada"])){

    }else{
       header("Location: error.php");
    }

*/




contarjsons();





    function contarjsons(){


        $divs = "";



        $fi = new FilesystemIterator("comandesjson", FilesystemIterator::SKIP_DOTS);
        printf("There were %d Files", iterator_count($fi));


        $contados = iterator_count($fi);



        foreach(glob("comandesjson".'/*.*') as $file) {

            $dia_com = substr($file, 13, -5);


            $divs .= "<div class='diacomanda' id = '$file'>Dia $dia_com </div>";

            echo $file;

        }


        echo $divs;

    }







    
    ?>

</div>
</body>

    <?php
    include("footer.php");
    ?>

</html>