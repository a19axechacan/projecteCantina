import Swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'

Swal.fire({
    title: 'Error!',
    text: 'Do you want to continue',
    icon: 'error',
    confirmButtonText: 'Cool'
})
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