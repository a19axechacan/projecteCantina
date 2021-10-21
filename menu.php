<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <link href="menu.css" rel="stylesheet" type="text/css">
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



    $menuFile = fopen("menu.json", "r");

    $menuRead = fread($menuFile, filesize("menu.json"));

    fclose($menuFile);


    $json = json_decode($menuRead, true);

    $menuDia = $json["dia"];
    $menuTarde = $json["tarde"];


    $form = "<div id='menuDia'>";
    $form.= writeMenu($menuDia);
    $form.= "</div>";

    $form .= "<div id='menuTarde'>";
    $form.= writeMenu($menuTarde);
    

    $form.= "</div>";
    $form .= "<input type='hidden' id ='horariDia' name='horariDia'>";

    


    function writeMenu($menu){
        $form="";
        foreach ($menu as $element) {
            $form .= "  <div id=" . $element['id'] . ">" . "
                    <label for=" . $element['id'] . ">" . $element['nom'] . ":</label>
                <button type='button' class='resta'>-</button> 
                <input type='text' id=" . $element['id'] . " name='" . $element['id'] .  "' value='0'   class='coger'>
                <button type='button' class='suma'>+</button> 
                <br><br>
                </div>
                ";
        }
        return $form;
    }
    
    ?>






    <div class="menu-container">
        <div id="menu">
            <p>
    
                <form id='formMenu' action='validacio.php' method='post'>
                   <?php echo $form?>
                   <input type="hidden"  id="json" value = "
                            <?php
                            echo htmlspecialchars($menuRead)
                   ?>
                                ">
                <button type='submit' id='comprar'>Comprar </button>  </form>

            </p>
        </div>
        <div id="compra">
            <h3 id=tuCompra>El teu carrito:</h3>
            <hr>
            <h4 id="c0"></h4>
            <h4 id="c1"></h4>
            <h4 id="c2"></h4>
            <h4 id="c3"></h4>
            <h4 id="c4"></h4>
            <h4 id="c5"></h4>
            <h4 id="c6"></h4>
            <h4 id="c7"></h4>
            <h4 id="c8"></h4>
            <h4 id="c9"></h4>
            <h4 id="c10"></h4>
            <h4 id="c11"></h4>
            <h4 id="com">Total gastat: 0€</h4>
        </div>
    </div>    

</div>
</body>

    <?php
    include("footer.php");
    ?>

</html>