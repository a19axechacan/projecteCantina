//En el moment en el que la pagina carga 
window.onload = function () {

    //Es recupera el json del element amb la id json
    const json = JSON.parse(document.getElementById("json").value);

    //Es desabilita l'opcio fins que afegeixi un element
    botonComprar.disabled= true;





    let hora = new Date().getHours();
    let minutes = new Date().getMinutes();

    //Mostrem el menu que correspon en el moment en el moment que es carga la pagina
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




    //S'afageix un listener per a que quan es modifiqui la comanda fagi les següents fucions
    //sumaProducte
    //restarProducte
    //sumaCarrito
    document.getElementById("formMenu").addEventListener("click", function (e) {

        let id = e.target.parentNode.parentNode.id;
        if (e.target.classList.contains("suma")) {
            sumarProducte(id);
            sumaCarrito();
        } else if (e.target.classList.contains("resta")) {
            restarProducte(id);
            sumaCarrito();

        }
    });







    
    //Si afegeix un producte el valor (que comença a 0) aumenta +1
    //Ademes imprimeix alguns valors que hem agafat del menu.json (mati o tarda) per mostrar un ticket
    function sumarProducte(id) {

        let input = document.querySelector("input[ id='" + id + "']");
        input.value++;
        input.setAttribute("value",parseInt(input.value))

        document.getElementById("c" + id).style.display = "block";


        Object.keys(json.dia).forEach(function (a){
            if (json.dia[a].id == id) {
                document.getElementById("c" + id).innerHTML = input.value + "x " + json.dia[a].nom + " -" + json.dia[a].preu + "€ -"
            }
        })
        Object.keys(json.tarde).forEach(function (a){
            if (json.tarde[a].id == id) {
                document.getElementById("c" + id).innerHTML = input.value + "x " + json.tarde[a].nom + " -" + json.tarde[a].preu + "€ -"
            }
        })


    }

    //Si afegeix un producte el valor (que comença a 0) aumenta -1
    //Tambe imprimeix els valors que volem del menu.json
    //Si despres de afegir elements a la comanda els treus tots, el boto de comprar no estara disponible
    function restarProducte(id) {
        let input = document.querySelector("input[ id='" + id + "']");


        if (input.value > 0) {
            input.value = input.value - 1;
            input.setAttribute("value",parseInt(input.value))



            Object.keys(json.dia).forEach(function (a){
                if (json.dia[a].id == id) {
                    document.getElementById("c" + id).innerHTML = input.value + "x " + json.dia[a].nom + " -" + json.dia[a].preu + "€ -"
                }
            })


            Object.keys(json.tarde).forEach(function (a){
                if (json.tarde[a].id == id) {
                    document.getElementById("c" + id).innerHTML = input.value + "x " + json.tarde[a].nom + " -" + json.tarde[a].preu + "€ -"
                }
            })

            if (input.value == 0) {

                document.getElementById("c" + id).style.display = "none";
            }
        }

    }

    //Agafem tots els elemtents del document i recorrem uns 
    function sumaCarrito() {

        let inputs = document.querySelectorAll("input[type=text]");
        let compra = [];

        for (let index = 0; index < inputs.length; index++) {

            Object.keys(json.dia).forEach(function (a){
                if (json.dia[a].id == inputs[index].id) {
                    let item = {
                        "nom": json.dia[a].nom,
                        "id": json.dia[a].id,
                        "preu": parseFloat(json.dia[a].preu),
                        "quantitat": parseInt(inputs[index].value)
                    }
                    if (item.quantitat > 0) {
                        compra.push(item);
                    }
                }
            })


            Object.keys(json.tarde).forEach(function (a){

                if (json.tarde[a].id == inputs[index].id) {

                    let item = {
                        "nom": json.tarde[a].nom,
                        "id": json.tarde[a].id,
                        "preu": parseFloat(json.tarde[a].preu),
                        "quantitat": parseInt(inputs[index].value)
                    }


                    if (item.quantitat > 0) {

                        compra.push(item);
                    }
                }
            })


        };

        let suma = 0;



        for (producte of compra) {
            let sumaproducte = producte.preu * producte.quantitat;
            suma += sumaproducte;
        }

        //Desactiva el disabled del borton comprar quan es modifica la compra
        let botonComprar= document.getElementById("botonComprar")

        if (suma == 0) {
            botonComprar.disabled= true;
        }
        else {
            botonComprar.disabled= false;
        }



        document.getElementById("com").innerHTML = "Total Gastat: " + suma.toFixed(2) + "€";



    }

}