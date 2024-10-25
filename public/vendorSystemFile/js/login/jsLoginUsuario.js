document.addEventListener('DOMContentLoaded', function () {
    // document.querySelector('#continuarRegistroEcoProveedores').addEventListener('click', function() {
    // });
    
});// FIN DOMContentLoaded


const formLuApp = new (function(){

    this.btnIniciarSesion = () => {
        email    = document.querySelector('#email').value;
        password = document.querySelector('#password').value;
        
        fetch( getUrlBase() + '/usuario/users', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
            body:  JSON.stringify( {      email: email    ,
                                       password: password ,   
                                       _token  : $('#token').val(),                               
            } )  //{'CIF': 'ESB00001111'}    JSON.stringify( data )    empresa: 'itmed', CIF:'1234'
        }).then( async (response) => {
            
            let data = await response.json();// get json response here
            switch (  response.status  ) {// Rest of status codes (200,400,500,303), can be handled here appropriately
                case 200:
                    mensajeSuccessGeneral( data.estado );
                    setTimeout(function() {
                        window.open( getUrlBase() + data.acceso ,"_self")
                    }, 3000);
                    break;
                case 400:
                    switch (  data.condicion  ) {
                        case 'session expired':
                            mensajeErrorGeneral(response.status, data.estado);
                            setTimeout(function() {
                                window.open(urlBase+"/index.php/eMarketServices/dashboard/form","_self");
                            }, 3000);
                            break;
                        default:
                            mensajeErrorGeneral(response.status, data.estado);
                            document.querySelector("#guardarPerfilVisitante").disabled = false;
                            break;
                    }
                    break;
                default:
                    mensajeErrorGeneral(response.status, data.estado);
                    break;
            } 

        }).catch(function(err) {
           console.log('Error:::'+err);
        });

       
    }

});

