var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    onDeviceReady: function() {
       // scanear();
	   if(parseInt(localStorage.getItem("pk_usuario"))>0)
	   {
		   $('#login').hide();
		   $('#registro').hide();
		    
		}
		else 
		{
			$('#home').hide();
		   $('#registro').hide();
		}
    }   
};


function cerrarSesion()
{
	localStorage.clear();
	$('#home').hide();
	$('#login').show();	
}

function registrar()
{
	$('#login').hide();	
	$('#registro').show();
}
