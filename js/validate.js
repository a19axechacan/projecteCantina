
//document.getElementById("enviaform").addEventListener("click", return validate());

// Form validation code will come here.
      function validate() {
      
        if( document.dades.nombre.value == "" ) {
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            );
           document.dades.nombre.focus() ;
           return false;
        }
        if( document.dades.telefono.value == "" || isNaN( document.dades.telefono.value ) ||
        document.dades.telefono.value.length != 9) {
           alert( "Telefono mal!" );
           document.dades.telefon.focus() ;
           return false;
        }


        if( document.dades.email.value == "" || !document.dades.email.value.includes("@") || !document.dades.email.value.includes(".") ) {
            alert( "email mal!" );
            document.dades.email.focus() ;
            return false;
         }
        


        return( true );
    }