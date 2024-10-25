document.addEventListener('DOMContentLoaded', function () {
    // document.querySelector('#continuarRegistroEcoProveedores').addEventListener('click', function() {
    // });
    
});// FIN DOMContentLoaded
const formRegistroUsuario = new (function(){

    this.btnGuardar = () => {


        validar = true;
        document.getElementById('nombresUser').classList.remove('is-invalid');
        document.getElementById('apellidosUser').classList.remove('is-invalid');
        document.getElementById('sexoUser').classList.remove('is-invalid');
        document.getElementById('paisUser').classList.remove('is-invalid');
        document.getElementById('cargoUser').classList.remove('is-invalid');
        document.getElementById('emailUser').classList.remove('is-invalid');
        document.getElementById('confirmarEmailUser').classList.remove('is-invalid');
        document.getElementById('password').classList.remove('is-invalid');
        document.getElementById('confirmarPassword').classList.remove('is-invalid');
    
    
        
        nombresUser = document.querySelector('#nombresUser').value;
        if( nombresUser == ''){
            validar = false;
            document.getElementById('nombresUser').classList.add('is-invalid');
        }

        apellidosUser = document.querySelector('#apellidosUser').value;
        if( apellidosUser == ''){
            validar = false;
            document.getElementById('apellidosUser').classList.add('is-invalid');
        }

        sexoUser = document.querySelector('#sexoUser').value;
        if( sexoUser == 'Selección desplegable'){
            validar = false;
            document.getElementById('sexoUser').classList.add('is-invalid');
        }

        paisUser = document.querySelector('#paisUser').value;
        if( paisUser == 'Selección desplegable'){
            validar = false;
            document.getElementById('paisUser').classList.add('is-invalid');
        }

        cargoUser = document.querySelector('#cargoUser').value;
        if( cargoUser == ''){
            validar = false;
            document.getElementById('cargoUser').classList.add('is-invalid');
        }

        emailUser = document.querySelector('#emailUser').value;
        if( emailUser == ''){
            validar = false;
            document.getElementById('emailUser').classList.add('is-invalid');
        }

        confirmarEmailUser = document.querySelector('#confirmarEmailUser').value;
        if( confirmarEmailUser == ''){
            validar = false;
            document.getElementById('confirmarEmailUser').classList.add('is-invalid');
        }

        password = document.querySelector('#password').value;
        if( password == ''){
            validar = false;
            document.getElementById('password').classList.add('is-invalid');
        }

        confirmarPassword  = document.querySelector('#confirmarPassword').value;
        if( confirmarPassword == ''){
            validar = false;
            document.getElementById('confirmarPassword').classList.add('is-invalid');
        }

        console.log(' getUrlBase: '+ getUrlBase());
        if( validar ){
            if(emailUser === confirmarEmailUser){
                if(password === confirmarPassword){  

                    fetch( getUrlBase() + '/usuario/registro.store', {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body:  JSON.stringify( {                               
                              nombresUser:nombresUser,
                            apellidosUser:apellidosUser,
                                 sexoUser:sexoUser,
                                 paisUser:(  paisUser.split('|')  )[0],
                                cargoUser:cargoUser,
                                emailUser:emailUser,
                                 password:password,
                                   _token:$('#token').val(),   
                        } )  //{'CIF': 'ESB00001111'}    JSON.stringify( data )    empresa: 'itmed', CIF:'1234'
                    }).then( async (response) => {                
                        let data = await response.json();// get json response here
                        switch (  response.status  ) {// Rest of status codes (200,400,500,303), can be handled here appropriately
                            case 200:
                                mensajeSuccessGeneral( data.estado );
                                setTimeout(function() {
                                    window.open( getUrlBase() + "/" + data.redirect ,"_self")
                                }, 3000);
                                break;
                            case 400:
                                // MENSAJES CONTROLADOS POR EL PROGRAMADOR
                                mensajeErrorGeneral(response.status, data.estado);
                                // document.querySelector("#guardarPerfilVisitante").disabled = false;
                                break;
                            default:
                                // MENSAJES DE ERROR DEL SISTEMA
                                mensajeErrorGeneral(response.status, data.message);
                                break;
                        } 
                    }).catch(function(err) {
                       console.log('Error:::'+err);
                    });

                }else{
                    mensajeErrorGeneral(404, "Las contraseñas no coinciden");                             
                }
            }else{
                mensajeErrorGeneral(404, "Los email no son iguales");      
            }
        }else{
            mensajeErrorGeneral(404, "Complete los campos indicados en rojo");

        }


    }// Fin btnGuardar

});