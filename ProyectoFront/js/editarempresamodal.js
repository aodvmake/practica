$(document).ready(function(){
	$("#guardar-e").click(function(){	
	    var editar =$("#guardar-e").val()
	    var nombre = $("#e-nombre").val()
		var telefono = $("#e-telefono").val()
		var email = $("#e-email").val()
		var ubicacion = $("#e-ubicacion").val()
        
      
     if (nombre!='' && telefono!='' && email!='' && ubicacion!='' && editar!='') {
		
			$("#guardar-e").val(editar);
			var parametros =Object.freeze({
				'nombre':nombre,
				'telefono':telefono,
				'email':email,
				'ubicacion':ubicacion,
				'editar':editar,
				'request':'data',
			});

			$.ajax({
				data: parametros,
				url:'../controllers/guardare.php',
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