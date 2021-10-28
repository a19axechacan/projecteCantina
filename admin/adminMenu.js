window.onload = function (){

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




}