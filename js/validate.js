
window.onload = function () {


    let buttonEnviar = document.getElementById("enviaform");
    let formValidacio = document.getElementById("formValidacio");

    buttonEnviar.addEventListener("click", function(){
        if(validar()==true){
            formValidacio.submit();
        }else{
        }
    });



}


function validar() {
    let nombre = document.getElementById("nombre").value;
    let telefono = document.getElementById("telefono").value;
    let email = document.getElementById("email").value;




    if (nombre == "") {
        alert("Nom buit!");

        return false;
    }

    else if (telefono == "") {

        return false;
    }
    else if (isNaN(telefono)) {
        alert("El telefon no es un numero!");
        console.log(telefono + " no es un numero");

        return false;
    }

    else if (telefono.length != 9) {
        alert("El telefon té que ser de 9 dígits!");

        console.log(telefono);

        return false;
    }


    else if (email == "" || !(email.endsWith("@inspedralbes.cat") && email.length > 18)) {
        alert("email mal!");
        return false;
    }
    return true;
}