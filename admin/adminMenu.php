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

<div class="cuerpo">
    <h1>Editar menú</h1>
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
                        <td><button class='buttonEliminar' type='button' id='" . $elementMenu["id"] . "'>X</button></td>";
                    if ($elementMenu["activat"]=="true"){
                        echo "<td><button class='buttonActivar' type='button' id='true-" . $elementMenu["id"] . "'>Desactivar</button></td>    ";
                    }else{
                        echo "<td><button class='buttonActivar' type='button' id='false-" . $elementMenu["id"] . "'>Activar</button></td>    ";
                    }
                }
                echo "</tr></table>";

            }
            ?>
            <form id="eliminarProducteForm" name="eliminarProducteForm" action="deleteElement.php" method="post">
                <input type="hidden" name="selectedId" id="selectedId">
            </form>

            <form id="activarDesactivarProducteForm" name="activatDesactivarProducteForm" action="activateDeactivateElement.php" method="post">
                <input type="hidden" name="selectedProduct" id="selectedIdActivarDesactivar">
            </form>


        </div>
        <div>
            <form name="producteNouForm" id="producteNouForm" action="addMenuElement.php" method="POST"  enctype="multipart/form-data">
                <h2>Nou producte</h2>
                <table>
                    <tr>
                        <td id="nom"><label for='nomProducte'>Nom producte: </label></td>
                        <td><input type='text' id='nomProducte' name='nomProducte'><br></td>
                    </tr>
                    <tr>
                        <td><br><label for='descProducte'>Descripció producte: </label></td>
                        <td><input type='text' id='descProducte' name='descProducte'><br></td>
                    </tr>
                    <tr>
                        <td><br><label for='preuProducte'>Preu: </label></td>
                        <td><input type='text' id='preuProducte' name='preuProducte' size="2"><br></td>
                    </tr>
                    <tr>
                        <td><br><label for='Menu'>Menu de: </label></td>
                        <td><select name="horariProducte" id="horariProducte">
                            <option value="dia">Dia</option>
                            <option value="tarde">Tarde</option>
                            </select><br>
                        </td>
                    </tr>
                    <tr>
                        <td><br><label for='imtage'>Imatge: </label></td>
                        <td><input id="foto" type="file" name="foto" /><br></td>
                    </tr>
                    </table>
                    <tr>
                        <div id="botoAfegir">
                            <td><br><button id="buttonAfegir" type="button">Afegir producte</button></td>
                        </div>
                    </tr> 
        </form>



        </div>
    </div>
</div>
</body>

<?php
include("../assets/footer.php");
?>

</html>