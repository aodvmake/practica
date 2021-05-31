$(document).ready(function(){
   $("#guardar").click(function(){	
	    var nombre = $("#nombre_h").val()
		var serial = $("#serial_h").val()
		var marca = $("#marca_h").val()
		var cantidad = $("#cantidad_h").val()
		var descripcion = $("#descripcion_h").val()

      if (nombre!='' && serial!='' && marca!='' && cantidad!='' && descripcion!='') {
			var parametros = Object.freeze({
				'nombre':nombre,
				'serial':serial,
				'marca':marca,
				'cantidad':cantidad,
				'descripcion':descripcion,
				'request':'save',
			});
			$.ajax({
				data: parametros,
				url:'../../controllers/inventarioController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
			
					$("#nombre_h").val("")
					$("#serial_h").val("")
					$("#marca_h").val("")
					$("#cantidad_h").val("")
					$("#descripcion_h").val("")
					alert(response);
					$("#addHerramienta").modal('hide');
					document.location.reload();
				}
			 });
		   }
	    else{
	  	alert('LLene todo los datos');
	    }	
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
				url:'../../controllers/inventarioController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
					if (response != null){
						var data = JSON.parse(response)
						
						$("#id_herramienta").val(data.id);
						$("#nombre_edit").val(data.nombre);
						$("#serial_edit").val(data.serial);
						$("#marca_edit").val(data.marca);
						$("#cantidad_edit").val(data.cantidad);
						$("#descripcion_edit").val(data.descripcion);
					}

				}
			});
	    });
//
   $("#guardar-edit").click(function(){	
	    var edit = $("#id_herramienta").val()
	    var nombre = $("#nombre_edit").val()
		var serial = $("#serial_edit").val()
		var marca = $("#marca_edit").val()
		var cantidad = $("#cantidad_edit").val()
		var descripcion = $("#descripcion_edit").val()

      if (nombre!='' && serial!='' && marca!='' && cantidad!='' && descripcion!='') {
			var parametros = Object.freeze({
				'edit':edit,
				'nombre':nombre,
				'serial':serial,
				'marca':marca,
				'cantidad':cantidad,
				'descripcion':descripcion,
				'request':'editar',
			});
			$.ajax({
				data: parametros,
				url:'../../controllers/inventarioController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
			
					$("#nombre_edit").val("")
					$("#serial_edit").val("")
					$("#marca_edit").val("")
					$("#cantidad_edit").val("")
					$("#descripcion_edit").val("")
					alert(response);
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
	   var btneliminar = $("#baja").val();
	   		    
	   		var parametros = Object.freeze({
		     'btneliminar':btneliminar,
		     'request':'btneliminar',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/inventarioController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
                alert(response)
                document.location.reload();
				}
			});
	    });
//
   $(document).on("click",".activar",function(){
	   var btnactivar = $(this).data('id');
	   		    
	   		var parametros = Object.freeze({
		     'btnactivar':btnactivar,
		     'request':'btnactivar',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/inventarioController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
                alert(response)
                document.location.reload();
				}
			});
	    });
//
   $("#retirar").click(function(){
	   var btnretirar = $("#retirar").val();
	   		var responsable=$("#nombre_retirar").val();
	   		var cantidad=$("#cantidad_retirar").val();
	   		
          if(responsable!='' && cantidad!=''){
	   		var parametros = Object.freeze({
		     'btnretirar':btnretirar,
		     'responsable':responsable,
		     'cantidad':cantidad,
		     'request':'btnretirar',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/inventarioController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
                alert(response)
                document.location.reload();
				}
			});
		   }
		   else{
		   	alert('Falta llenar los datos');
		   }
	    });
//
   $('#btnentrega').click(function(){
	
	   		var parametros = Object.freeze({
		     'request':'btnentrega',
			});
			$.ajax({
				data: parametros,
				url:'../../controllers/inventarioController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
                $("#entregas").html(response);
				}
		     });
          });
//
   $(document).on("click",".btnregresar",function(){
       var btnregresar = $(this).data('id');

       var parametros = Object.freeze({
		   'btnregresar':btnregresar,
		   'request':'btnregresar',
			});

       $.ajax({
				data: parametros,
				url:'../../controllers/inventarioController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
                alert(response);
                document.location.reload();
				}
		     });
   	  });
//
});
	$(obtener_registro(''));
  	function obtener_registro(consulta) {
  		$.ajax({
  			url:'../../controllers/inventarioController.php',
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
  			url:'../../controllers/inventarioController.php',
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
  $('#baja').val(id);
}
function sq(id){
  $('#retirar').val(id);	
}
