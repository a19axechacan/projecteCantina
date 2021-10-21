window.onload = function () {


    const json = JSON.parse(document.getElementById("json").value);



    document.getElementById("comprar").addEventListener("click", pasajson());



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
    else {
        if (minutes < 30) {
            document.getElementById("horariDia").value = true;
            document.getElementById("menuTarde").style.display = "none";
        }
        else {
            document.getElementById("horariDia").value = false;
            document.getElementById("menuDia").style.display = "none";
        }  
    }





    document.getElementById("formMenu").addEventListener("click", function (e) {

        let id= e.target.parentNode.parentNode.id;
        if (e.target.classList.contains("suma")) {
            sumarProducte(id);
            sumaCarrito();
        } else if (e.target.classList.contains("resta")) {
            restarProducte(id);
            sumaCarrito();

        }
    });



    function pasajson() {
        let inputs = document.querySelectorAll("input[type=text]");

        let compra = [];

        for (let index = 0; index < inputs.length; index++) {


            for (element of json.dia) {
                if (element.id == index) {
                    let item = {
                        "nom": element.nom,
                        "id": element.id,
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
                        "quantitat": parseInt(inputs[index].value)
                    }

                    if (item.quantitat > 0) {
                        compra.push(item);
                    }
                }
            }


        };

        document.getElementById("jsoncompra").value = JSON.stringify(compra);

    }






    function sumarProducte(id) {
        let input = document.querySelector("input[ id='" + id + "']");
        input.value++;
        document.getElementById("c" + id).style.display = "block";

        for (element of json.dia) {
            if (element.id == id) {
                document.getElementById("c" + id).innerHTML = input.value + "x " + element.nom + " -" + element.preu + "€ -"
            }

            for (element of json.tarde) {
                if (element.id == id) {
                    document.getElementById("c" + id).innerHTML = input.value + "x " + element.nom + " -" + element.preu + "€ -"
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
                    document.getElementById("c" + id).innerHTML = input.value + "x " + element.nom + " -" + element.preu + "€ -"
                }

                for (element of json.tarde) {
                    if (element.id == id) {
                        document.getElementById("c" + id).innerHTML = input.value + "x " + element.nom + " -" + element.preu + "€ -"
                    }
                }
            }
            if (input.value == 0) {
               
                document.getElementById("c" + id).style.display = "none";
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
            let suma = 0;

            for (producte of compra) {


                let sumaproducte = producte.preu * producte.quantitat;
                suma += sumaproducte;

            }


            document.getElementById("com").innerHTML = "Total Gastat: " + suma.toFixed(2) + "€";



        }

    }