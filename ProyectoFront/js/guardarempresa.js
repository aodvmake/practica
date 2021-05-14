$(document).ready(function(){
	$("#guardar").click(function(){	
	    var nombre = $("#nombre").val()
		var telefono = $("#telefono").val()
		var email = $("#email").val()
		var ubicacion = $("#ubicacion").val()

      if (nombre!='' && telefono!='' && email!='' && ubicacion!='') {
			var parametros =Object.freeze({
				'nombre':nombre,
				'telefono':telefono,
				'email':email,
				'ubicacion':ubicacion,
				'request':'data',
			});

			$.ajax({
				data: parametros,
				url:'../controllers/guardarempresa.php',
				type:'POST',
				beforeSend: function () {
		        },
				success:  function (response) {
			
					$("#nombre").val("")
					$("#telefono").val("")
					$("#email").val("")
					$("#ubicacion").val("")
					alert(response);
				}
			});
		}
	  else{
	  	alert('LLene todo los datos');
	  }	
	  });
	});