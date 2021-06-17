$(document).ready(function(){		
			var parametros = Object.freeze({
				'request':'consul',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/editarController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
				if (response != null){
						var data = JSON.parse(response)
						$("#nombre").val(data.nombre);
						$("#telefono").val(data.telefono);
						$("#direccion").val(data.direccion);
						$("#pass").val(data.pass);
					}

				}
	    });
//
   $('#mostrar_contrasena').click(function () {
    if ($('#mostrar_contrasena').is(':checked')) {
      $('#contrasena').attr('type', 'text');
    } else {
      $('#contrasena').attr('type', 'password');
    }
  });
//
    $("#enviar").click(function(){
	    var nombre = $("#nombre").val()
	    var telefono = $("#telefono").val()
	    var direccion = $("#direccion").val()
	    var contrasena = $("#contrasena").val()
         
         if (nombre!='' && telefono!='' && direccion!=''){
			var parametros = Object.freeze({
				'nombre':nombre,
				'telefono':telefono,
				'direccion':direccion,
				'contrasena':contrasena,
				'request':'actualizar',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/editarController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
					alert(response);
					document.location.reload();
				}
			});
		   }
		   else{
		   	alert("LLene todos los datos");
		   }
	    });   
//   
});

//
function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
return /\d/.test(String.fromCharCode(keynum));
}