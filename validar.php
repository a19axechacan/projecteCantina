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
    <h1>Formulario escribido</h1>




<?php 




$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$json = $_POST["json"];
$obj = null;


validacio($nombre, $email, $telefono, $json);
$obj = var_dump(json_decode($json, true));
print $obj;






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