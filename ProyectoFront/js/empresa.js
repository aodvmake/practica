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
				url:'../../controllers/controllerempresa.php',
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
	//
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


//

	});

	$(obtener_registro());
  	function obtener_registro(re) {
  		$.ajax({
  			url:'../../controllers/controllerempresa.php',
  			type:'POST',
  			dataType:'html',
  			data:{re:re},
  		})
  		.done(function(resultado){
  			$("#resultados").html(resultado);
  		})
  	}
  	$(document).on('keyup','#busqueda',function(){
  		var valorBusqueda=Object.freeze($(this).val());
  		if (valorBusqueda!=""){
  			obtener_registro(valorBusqueda);
  		}
  		else{
  			obtener_registro();
  		}
  	});

 //

function square(id) {
  $('#guardar-e').val(id);
  $('#baja').val(id);
}

