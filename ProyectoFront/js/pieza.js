$(document).ready(function(){
    $("#guardar").click(function(){	
	    var nombre = $("#nombre_add").val()
		var precio = $("#precio_add").val()

      if (nombre!='' && precio!='') {
			var parametros = Object.freeze({
				'nombre':nombre,
				'precio':precio,
				'request':'save',
			});
			$.ajax({
				data: parametros,
				url:'../../controllers/piezaController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
			
					$("#nombre_add").val("")
					$("#precio_add").val("")
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
	    var editar =$("#id_Empresa").val()
	    var nombre = $("#nombre_edit").val()
		var telefono = $("#telefono_edit").val()
		var email = $("#email_edit").val()
		var ubicacion = $("#ubicacion_edit").val()
      
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
				url:'../../controllers/empresaController.php',
				type:'POST',
				beforeSend: function () {
		        },
				success:  function (response) {
			
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
    $(document).on("click",".btneditar",function(){
	   var btneditar = $(this).data('id');
	   		    
	   		var parametros = Object.freeze({
		     'btneditar':btneditar,
		     'request':'btneditar',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/piezaController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
					if (response != null){
						var data = JSON.parse(response)
						
						$("#id_pieza").val(data.id);
						$("#nombre_edit").val(data.nombre);
						$("#precio_edit").val(data.precio);
					}
				}
			});
	    });
//
});


	$(obtener_registro(''));
  	function obtener_registro(consulta) {
  		$.ajax({
  			url:'../../controllers/piezaController.php',
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
  			url:'../../controllers/piezaController.php',
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