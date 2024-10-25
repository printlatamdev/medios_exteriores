$(document).ready(function() {

    // In your Javascript (external .js resource or <script> tag)
    // $(document).ready(function() {
		$('.textBuscarSelect').select2({
			theme: "bootstrap4",
			maximumInputLength: 50 // only allow terms up to 20 characters long
	    }); // texto buscar en select
	// });

});

var mensajeErrorGeneral = function(error, mensaje){
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error '+error,
        text: mensaje,
        // footer: '<a href>Why do I have this issue?</a>'
    });
}

var mensajeSuccessGeneral = function(mensaje){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: mensaje,
        showConfirmButton: false,
        timer: 3000
    });
}

var UrlBase = '';
function getUrlBase(){
    return UrlBase;
}
function setUrlBase(url){
    this.UrlBase = url;
}
