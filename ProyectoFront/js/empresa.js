$(document).ready(function(){
	$("#guardar").click(function(){	
	    var nombre = $("#nombre").val()
		var telefono = $("#telefono").val()
		var email = $("#email").val()
		var ubicacion = $("#ubicacion").val()

      if (nombre!='' && telefono!='' && email!='' && ubicacion!='') {
			var parametros = Object.freeze({
				'nombre':nombre,
				'telefono':telefono,
				'email':email,
				'ubicacion':ubicacion,
				'request':'save',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/empresaController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
			
					$("#nombre").val("")
					$("#telefono").val("")
					$("#email").val("")
					$("#ubicacion").val("")
					alert(response);
					$("#addEmpresa").modal('hide');
					document.location.reload();
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
		
			var parametros = Object.freeze({
				'nombre':nombre,
				'telefono':telefono,
				'email':email,
				'ubicacion':ubicacion,
				'editar':editar,
				'request':'editarempresa',
			});

			$.ajax({
				data: parametros,
				url:'../controllers/guardare.php',
				type:'POST',
				beforeSend: function () {
		        },
				success:  function (response) {
			
					$("#e-nombre").val("")
					$("#e-telefono").val("")
					$("#e-email").val("")
					$("#e-ubicacion").val("")
					alert(response);
					$("#editEmpresa").modal('hide');
					document.location.reload();
				}
			});
		}
	  else{
	  	alert('LLene todo los datos');
	  }
   	
	  });

//
	$("#altaempresa").click(function(){
	    var alta = $("#altaempresa").val()

			var parametros = Object.freeze({
				'alta':alta,
				'request':'alta',
			});
 
			$.ajax({
				data: parametros,
				url:'../../controllers/empresaController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
					alert(response);
					$("#bajasTemporales").modal('hide');
					document.location.reload();
				}
			});
		});

//

    $("#baja").click(function(){
	    var baja = $("#baja").val()

			var parametros = Object.freeze({
				'baja':baja,
				'request':'baja',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/empresaController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
					alert(response);
					$("#deleteEmpresa").modal('hide');
					document.location.reload();
				}
			});
	    });

//

});


	$(obtener_registro(''));
  	function obtener_registro(consulta) {
  		$.ajax({
  			url:'../../controllers/empresaController.php',
  			type:'POST',
  			dataType:'html',
  			data:{'consulta':consulta,'request':'consulta'},
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
  			obtener_registro('');
  		}
  	});

 //
	$(obtener_registrobajas(''));
  	function obtener_registrobajas(consultabaja) {
  		$.ajax({
  			url:'../../controllers/empresaController.php',
  			type:'POST',
  			dataType:'html',
  			data:{'consultabaja':consultabaja,'request':'consultabaja'},
  		})
  		.done(function(resultadobaja){
  			$("#bajasresultado").html(resultadobaja);
  		})
  	}
  	$(document).on('keyup','#buscabaja',function(){
  		var valorBusquedabaja=Object.freeze($(this).val());
  		if (valorBusquedabaja!=""){
  			obtener_registrobajas(valorBusquedabaja);
  		}
  		else{
  			obtener_registrobajas('');
  		}
  	});
 
 //

function square(id) {
  $('#guardar-e').val(id);
  $('#baja').val(id);
}
function squarebaja(id) {
  $('#altaempresa').val(id);
}

