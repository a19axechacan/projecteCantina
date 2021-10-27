<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <link href="menu.css" rel="stylesheet" type="text/css">
    <title>Menu</title>
    <script src="js/menu.js"></script>

    <?php
    include("assets/header.php");
    ?>

</head>
<body>
<div class="cuerpo">
    <h1>Menu especial</h1>

    <?php

/*

    if(empty($_COOKIE["compraRealitzada"])){

    }else{
       header("Location: error.php");
    }

*/


    $menuFile = fopen("menu.json", "r");

    $menuRead = fread($menuFile, filesize("menu.json"));

    fclose($menuFile);


    $json = json_decode($menuRead, true);

    $menuDia = $json["dia"];
    $menuTarde = $json["tarde"];


    $form = "<div id='menuDia' class='menu-container'>";
    $form.= writeMenu($menuDia);
    $form.= "</div>";

    $form .= "<div id='menuTarde' class='menu-container'>";
    $form.= writeMenu($menuTarde);
    

    $form.= "</div>";
    $form .= "<input type='hidden' id ='horariDia' name='horariDia'>";
    $form .= "<input type='hidden' id ='jsoncompra' name='jsoncompra'>";


    function writeMenu($menu){
        $form="";
        foreach ($menu as $element) {
            $form .= "  <div id=" . $element['id'] . ">" . "
            <img src=".$element['imatge']." width='100%' height='277px'>
            <div class='menu-item-label'>
                    <label  for=" . $element['id'] . ">" . $element['nom'] . ":</label>
                    <br>
                <button type='button' class='resta'>-</button> 
                <input size='1' type='text' id=" . $element['id'] . " name='" . $element['id'] .  "' value='0'   class='coger'>
                <button type='button' class='suma'>+</button> 
                <br><br>
                </div>
                </div>
                ";
        }
        return $form;
    }
    
    ?>

    <div class="menu-list">
        <div id="menu">
                <form id='formMenu' action='validacio.php' method='post' >
                   <?php echo $form?>
                   <input type="hidden"  id="json" value = "
                            <?php
                            echo htmlspecialchars($menuRead)
                   ?>
                                ">
                
        </div>
        <div id="compra">
            <div class="compra-container">
                <div>
                    <h3 id=tuCompra>El teu tiquet:</h3>
                </div>
                
                <div>
                    <h4 id="c0" class="card"></h4>
                    <h4 id="c1" class="card"></h4>
                    <h4 id="c2" class="card"></h4>
                    <h4 id="c3" class="card"></h4>
                    <h4 id="c4" class="card"></h4>
                    <h4 id="c5" class="card"></h4>
                    <h4 id="c6" class="card"></h4>
                    <h4 id="c7" class="card"></h4>
                    <h4 id="c8" class="card"></h4>
                    <h4 id="c9" class="card"></h4>
                    <h4 id="c10" class="card"></h4>
                    <h4 id="c11" class="card"></h4>
                </div>
                <div>
                    <h4 id="com">Total gastat: 0€</h4>
                </div>
                <div id="finalTiquet">
                    <button type='submit' id='botonComprar'>Comprar </button>  </form>
                </div>
            </div>
            
        </div>
    </div>    

</div>
</body>

    <?php
    include("assets/footer.php");
    ?>

</html>