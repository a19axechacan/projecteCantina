window.onload = function () {


    let hora = new Date().getHours();
    let minutes = new Date().getMinutes();



    if(hora<11&&minutes<30){
        document.getElementById("horariDia").value = true;
        document.getElementById("menuTarde").style.display="none";
    }else {
        document.getElementById("horariDia").value = false;
        document.getElementById("menuDia").style.display="none";
    }





    document.getElementById("formMenu").addEventListener("click", function (e) {

        if (e.target.classList.contains("suma")) {
            sumarProducte(e.target.parentNode.id);
        } else if (e.target.classList.contains("resta")) {
            restarProducte(e.target.parentNode.id);

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
    }

    function restarProducte(id) {
        let input = document.querySelector("input[ id='" + id + "']");

        if (input.value > 0) {
            input.value = input.value - 1;
        }

    }



}