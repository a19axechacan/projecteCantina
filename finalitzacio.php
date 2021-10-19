<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <title>Document</title>

    <?php
    include("header.php");
    ?>

</head>
<body>
    <div class="cuerpo">
        <h1>Comanda confirmada</h1>
           </div>



    <?php
    $options = array (
        'expires' => time() + 86400,
        'path' => '/',
        'secure' => true,
        'samesite' => 'Lax'
    );
    setcookie('ultimaCompra', time(), $options);







    $myFile = fopen("comandes", "a+");

    $json = '{
    "glossary": {
        "title": "example glossary",
		"GlossDiv": {
            "title": "S",
			"GlossList": {
                "GlossEntry": {
                    "ID": "SGML",
					"SortAs": "SGML",
					"GlossTerm": "Standard Generalized Markup Language",
					"Acronym": "SGML",
					"Abbrev": "ISO 8879:1986",
					"GlossDef": {
                        "para": "A meta-markup language, used to create markup languages such as DocBook.",
						"GlossSeeAlso": ["GML", "XML"]
                    },
					"GlossSee": "markup"
                }
            }
        }
    }
}';

    fwrite($myFile, $json);






    fclose($myFile);

























    ?>







</body>

    <?php
    include("footer.php");
    ?>

</html>