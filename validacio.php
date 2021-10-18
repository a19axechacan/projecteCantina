<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Validacio</title>
    <script src="js/validate.js"></script>

</head>
<body>
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




$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$json = $_GET["comanda"];




validacio($nombre, $email, $telefono, $json);
$obj = var_dump(json_decode($json,true));
print_r ($obj);







function validacio($nombre, $email, $telefono, $json){

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



</body>
</html>