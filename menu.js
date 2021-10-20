window.onload = function () {





    const json = JSON.parse(document.getElementById("json").value);

    



    let hora = new Date().getHours();
    let minutes = new Date().getMinutes();


    if (hora < 11) {
        document.getElementById("horariDia").value = true;
        document.getElementById("menuTarde").style.display = "none";
    }
    else if (hora > 11) {
        document.getElementById("horariDia").value = false;
        document.getElementById("menuDia").style.display = "none";
    }
    else if (minutes < 30) {
        document.getElementById("horariDia").value = true;
        document.getElementById("menuTarde").style.display = "none";
    }
    else {
        document.getElementById("horariDia").value = false;
        document.getElementById("menuDia").style.display = "none";
    }



    /*if(hora<11&&minutes<30){
        document.getElementById("horariDia").value = true;
        document.getElementById("menuTarde").style.display="none";
    }else {
        document.getElementById("horariDia").value = false;
        document.getElementById("menuDia").style.display="none";
    }*/





    document.getElementById("formMenu").addEventListener("click", function (e) {

        if (e.target.classList.contains("suma")) {
            sumarProducte(e.target.parentNode.id);
            sumaCarrito();
        } else if (e.target.classList.contains("resta")) {
            restarProducte(e.target.parentNode.id);
            sumaCarrito();

        }
    });













    /*
        let buttonComprar = document.getElementById("comprar");
    
        buttonComprar.addEventListener('click', function () {
            let inputs = document.getElementsByTagName("input");
    
            let compra = [];
    
            for (let index = 0; index < inputs.length; index++) {
    
    
                let item = {
                    "nom": inputs[index].name,
                    "id": inputs[index].id,
                    "quantitat": inputs[index].value
                }
    
                if (item.quantitat > 0) {
                    compra.push(item);
                }
            }
    
            let json = JSON.stringify(compra);
    
            document.getElementById("json").value = json;
            document.getElementById("formMenu").submit();
    
        });*/




    function sumarProducte(id) {
        let input = document.querySelector("input[ id='" + id + "']");
        input.value++;

        for (element of json.dia) {
            if (element.id == id) {
                document.getElementById("c" + id).innerHTML = element.nom + " " + input.value
            }

            for (element of json.tarde) {
                if (element.id == id) {
                    document.getElementById("c" + id).innerHTML = element.nom + " " + input.value
                }
            }
        }



    }

    function restarProducte(id) {
        let input = document.querySelector("input[ id='" + id + "']");

        if (input.value > 0) {
            input.value = input.value - 1;

            for (element of json.dia) {
                if (element.id == id) {
                    document.getElementById("c" + id).innerHTML = element.nom + " " + input.value
                }

                for (element of json.tarde) {
                    if (element.id == id) {
                        document.getElementById("c" + id).innerHTML = element.nom + " " + input.value
                    }
                }
            }

        }

    }

    function sumaCarrito() {
        let inputs = document.querySelectorAll("input[type=text]");

        let compra = [];

        for (let index = 0; index < inputs.length; index++) {


            for (element of json.dia) {
                if (element.id == index) {
                    let item = {
                        "nom": element.nom,
                        "id": element.id,
                        "preu": element.preu,
                        "quantitat": inputs[index].value
                    }

                    if (item.quantitat > 0) {
                        compra.push(item);
                    }
                }

            }

                for (element of json.tarde) {
                    if (element.id == index) {
                        let item = {
                            "nom": element.nom,
                            "id": element.id,
                            "preu": parseFloat(element.preu),
                            "quantitat": parseInt(inputs[index].value) 
                        }

                        if (item.quantitat > 0) {
                            compra.push(item);
                        }
                    }
                }


            };
            let suma= 0;

            for(producte of compra){

               
                let sumaproducte= producte.preu * producte.quantitat;
                suma+= sumaproducte; 
                console.log(producte.preu)
            }


            document.getElementById("com").innerHTML= "Total Gastat: "+ suma.toFixed(2) +"€";

        }

    }