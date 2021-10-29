window.onload = function (){

    let buttonAfegir= document.getElementById("buttonAfegir");

    let formEliminarProducte = document.getElementById("eliminarProducteForm");
    let inputEliminarProducte=  document.getElementById("selectedId");
    document.getElementById("menu-container").addEventListener("click", function (e) {
        if (e.target.classList.contains("buttonEliminar")) {
          inputEliminarProducte.value = e.target.id;
          if(confirm("Segur que vols eliminar aquest element del menú?")){
              formEliminarProducte.submit();
          }else alert("Acció cancelada");

        }
    });

    let producteNouForm= document.getElementById("producteNouForm");
    let nomProducte= document.getElementById("nomProducte");
    let descProducte= document.getElementById("descProducte");
    let preuProducte= document.getElementById("preuProducte");
    let foto= document.getElementById("foto");

    buttonAfegir.addEventListener("click", function(){
        if(nomProducte.value!="" && descProducte.value!="" && (preuProducte.value!="" && isNaN(preuProducte.value)== false) && foto.value!=""){
            producteNouForm.submit();
    }
    else {
        alert("Dades invàlides");
    }
    })


}