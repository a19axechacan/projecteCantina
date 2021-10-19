<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <title>Document</title>

    <header>
        <div class="header-container">
            <div><img id="logo" src="css\logo.png" width="100px" height="100px"></div> 
            <div id="C">
                <p>CANTINA</p>  
                <p>INSTITUT</p>
                <p>PEDRALBES</p>
            </div>
            <div id="M">
                <a href="menu.php"><img id="I" src="css\bolsa.jpg" width="82px" height="82px"></a>
                <p id="T">Menú</p>
            </div>
        </div>
    </header>

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

    <footer>
        <div class="footer-container">
            <div id="email">
                <p>Contáctanos:</p>
            </div>
            <div id="email">
                <p>a20servilrac@inspedralbes.cat</p>
                <p>a17chetrupos@inspedralbes.cat</p>
                <p>a19axechacan@inspedralbes.cat</p>
            </div>
        </div>
    </footer>
</html>