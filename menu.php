<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="capçalera.css" rel="stylesheet" type="text/css">
    <title>Menu</title>
    <script src="menu.js"></script>

    <header>
        <div class="header-container">
            <div id="logo"><img src="css\logo.png" width="85px" height="85px"></div> 
            <div id="C">
                <p>CANTINA</p>  
                <p>INSTITUT</p>
                <p>PEDRALBES</p>
            </div>
        </div>
    </header>

</head>
<body>
    <div class="cuerpo">
        <h1>menu</h1>
    
    
    

    <?php 
    
    
    $menu = [
        0=>[
            "id"=> 0 ,
            "nom"=>"Entrepà de fuet" ,
            "descripció"=> "Entrepà de fuet amb tomàquet",
            "imatge"=>"adsadas",
            "preu"=> 1.50  
        ],
        1=>[
            "id"=> 1 ,
            "nom"=>"Entrepà de formatge" ,
            "descripció"=> "Entrepà de formatge amb tomàquet",
            "imatge"=>"adsadas",
            "preu"=> 1.50  
        ],
        2=>[
            "id"=> 2 ,
            "nom"=>"Donut" ,
            "descripció"=> "Donut amb sucre",
            "imatge"=>"adsadas",
            "preu"=> 0.60  
        ],
        3=>[
            "id"=> 3 ,
            "nom"=>"Cafè" ,
            "descripció"=> "Cafè sol",
            "imatge"=>"adsadas",
            "preu"=> 1.20
        ],
        4=>[
            "id"=> 4 ,
            "nom"=>"Suc de taronja" ,
            "descripció"=> "Suc de taronja petit",
            "imatge"=>"adsadas",
            "preu"=> 2  
        ],
        5=>[
            "id"=> 5 ,
            "nom"=>"Suc de pinya" ,
            "descripció"=> "Suc de pinya petit",
            "imatge"=>"adsadas",
            "preu"=> 1.85 
        ]
        ];

    
    $form ="";
    foreach ($menu as $element){
        $form .= "  <div id=".$element['id'].">"."
                    <label for=".$element['id'].">".$element['nom'].":</label>
                   <button type='button' class='resta'>-</button> 
                   <input type='text' id=".$element['id']." name='".$element['nom']."' value='0'>
                   <button type='button' class='suma'>+</button> 
                   <br><br>
                   </div>
                   ";
    }
    
    $form .= "<input type='hidden' id ='json' name='comanda'>";

    echo "<form id='formMenu' action='validacio.php' method='get'> ". $form . " <button type='button' id='comprar'>Comprar </button>  </form>";
    ?>
</div>
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