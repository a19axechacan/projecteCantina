<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link href="normalize.css" rel="stylesheet" type="text/css">
    <title>Landing Page</title>

    <?php
    include("assets/header.php");
    ?>
    
</head>
<body>
    <div class="cuerpo">
        <div class="admin-container">
            <h1 id="obj">LA MAJOR VARIETAT DE PRODUCTES</h1>
            <div id="A">
                <a href="admin/admin.php"><img id="zoom" src="css/admin.png" width="80px" height="80px"></a>
                <p id="admin">Administració</p>
            </div>
        </div>
        
        <div class="CTA-container">
            <div id="CTA1">
                <a href="menu.php"><img id="zoomimg" src="css\bocadillo1.jpg" width="650px" height="420px"></a>
            </div>   
            <div id="CTA2">
                <a href="menu.php"><img id="zoomimg" src="css\bocadillo2.jpg" width="650px" height="420px"></a>
            </div>
            <div id="CC">
                <a href="menu.php"><img id="zoom" src="css\carrito.png" width="150px" height="150px"></a>
            </div>      
        </div>
        
    </div>

</body>

    <?php
    include("assets/footer.php");
    ?>

</html>