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
    
echo $menuRead;
    $form.= "</div>";
    $form.= "<input type='hidden ' id='json' name='json' value= '".   $menuRead . "'>";
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
                <?php
                    echo "<form id='formMenu' action='validacio.php' method='post'> " . $form . " <button type='submit' id='comprar'>Comprar </button>  </form>";
                ?>
            </p>
        </div>
        <div id="compra">
            <h3 id=com>Tu Compra:</h3>
            <hr>
            <h4 id="c0">Total gastat en entrpans de pernil:</h4>
            <h4 id="c1">Total gastat en entrpans de bacon:</h4>
            <h4 id="c2">Total gastat en Kit-Kat:</h4>
            <h4 id="c3">Total gastat en cafes amb llet:</h4>
            <h4 id="c4">Total gastat batuts de xoxolata:</h4>
            <h4 id="c5">Total gastat batuts de maduixa:</h4>
            <h4 id="com">Total gastat:</h4>
        </div>
    </div>    

</div>
</body>

    <?php
    include("footer.php");
    ?>

</html>