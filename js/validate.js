
      function validar() {
      
        if( document.dades.nombre.value == "" ) {
            alert( "Nombre mal!" );

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
        


        return true ;
    }