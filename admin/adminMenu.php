<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/projecteCantina/capçalera.css" rel="stylesheet" type="text/css">
    <link href="adminMenu.css" rel="stylesheet" type="text/css">
    <script src="adminMenu.js"></script>
    <title>Administar menú</title>

    <?php
    include("../assets/header.php");

    $menuFile = fopen("../menu.json", "r");
    $menuRead = fread($menuFile, filesize("../menu.json"));
    fclose($menuFile);
    $arrayMenus = json_decode($menuRead, true);


    ?>

</head>

<h1>Editar menú</h1>

<div class="cuerpo">

    <div id="menu-container">
        <div>
            <?php

            foreach ($arrayMenus as $key => $menu) {
                echo "<table> 
                        <h2>Menú " . $key . "</h2> 
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>                      
                                <th>Descripció</th> 
                                <th>Preu</th>
                            </tr>
                         </thead> ";
                foreach ($menu as $elementMenu) {
                    echo "<tr class='menu-element'>
                        <td><label for='" . $elementMenu["id"] ."'>" . $elementMenu["id"] . "    </label></td>
                         <input type='hidden' name='" . $elementMenu["id"] . "'  value='" . $elementMenu["id"] . "' >
                        <td><input type='text' id='" . $elementMenu["id"] . "' name='" . $elementMenu["id"] . "nom'  value='" . $elementMenu["nom"] . "' readonly ></td>
                        <td><input type='text' id='" . $elementMenu["id"] . "' name='" . $elementMenu["id"] . "desc'  value='" . $elementMenu["descripció"] . "' size='35' readonly></td>
                        <td><input type='text' id='" . $elementMenu["id"] . "' name='" . $elementMenu["id"] . "preu'  value='" . $elementMenu["preu"] . "' size='5' readonly></td>
                        <td><button class='buttonEliminar' type='button' id='" . $elementMenu["id"] . "'>X</button></td>
                        </tr>";
                }
                echo "</table>";

            }
            ?>
            <form id="eliminarProducteForm" name="eliminarProducteForm" action="deleteElement.php" method="post">
                <input type="hidden" name="selectedId" id="selectedId">
            </form>


        </div>
        <div>
            <form name="producteNouForm" id="producteNouForm" action="addMenuElement.php" method="POST"  enctype="multipart/form-data">
                <h2>Nou producte</h2>

                <div>
                    <label for='nomProducte'>Nom producte: </label>
                    <input type='text' id='nomProducte' name='nomProducte'>
                </div>
                <div>
                    <label for='descProducte'>Descripció producte: </label>
                    <input type='text' id='descProducte' name='descProducte'>
                </div>
                <div>
                    <label for='preuProducte'>Preu: </label>
                    <input type='text' id='preuProducte' name='preuProducte' size="2">
                </div>

                <div>
                    <select name="horariProducte" id="horariProducte">
                        <option value="dia">Dia</option>
                        <option value="tarde">Tarde</option>
                    </select>
                </div>
                <div>
                    <input type="file" name="foto" />
                </div>
                <button id="buttonAfegir" type="submit">Afegir producte</button>
        </div>
        </form>



    </div>
</div>
</body>

<?php
include("../assets/footer.php");
?>

</html>