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
					$("#addPieza").modal('hide');
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
		var editar = $("#id_pieza").val()
	    var nombre = $("#nombre_edit").val()
		var precio = $("#precio_edit").val()
      
      if (nombre!='' && precio!='' && editar!='') {
		
			var parametros = Object.freeze({
				'nombre':nombre,
				'precio':precio,
				'editar':editar,
				'request':'editarpieza',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/piezaController.php',
				type:'POST',
				beforeSend: function(){
		        },
				success:  function (response) {
			
					alert(response);
					$("#editPieza").modal('hide');
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
				url:'../../controllers/piezaController.php',
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
    $(document).on("click",".alta",function(){
	   var alta = $(this).data('id');
	   		    
	   		var parametros = Object.freeze({
		     'alta':alta,
		     'request':'alta',
			});
        
			$.ajax({
				data: parametros,
				url:'../../controllers/piezaController.php',
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