window.onload = function () {



    document.getElementById("menu-container").addEventListener("click", function (e) {

        let formEliminar = document.getElementById("deleteItemForm");

        if (e.target.classList.contains("eliminar")) {
            document.getElementById("selectedItem").value=e.target.id;
            formEliminar.submit();
        }
    });




}