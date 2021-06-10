$(document).ready(function(){
    $("#guardar").click(function(){	
	    var nombre = $("#nombre_add").val()
		var telefono = $("#telefono_add").val()
		var idpuestos=$("#idpuesto").val()
		var email=$("#email_add").val()
        var pass=$("#pass_add").val()
        var ubicacion=$("#ubicacion_add").val()

        if (nombre!='' && telefono!='' && idpuestos!='' && email!='' && pass!='' && ubicacion!='') {
			var parametros = Object.freeze({
				'nombre':nombre,
				'idpuestos':idpuestos,
				'telefono':telefono,
				'email':email,
				'pass':pass,
				'ubicacion':ubicacion,
				'request':'save',
			});
		   $.ajax({
				data: parametros,
				url:'../../controllers/usuariosController.php',
				type:'POST',
				beforeSend: function(){
		        },
				success:function(response){
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
	$("#guardar-e").click(function(){
		var editar = $("#idusuario").val()
		var nombre = $("#nombre_edit").val()
		var telefono = $("#telefono_edit").val()
		var email = $("#correo_edit").val()
		var direccion = $("#direccion_edit").val()
		var pass = $("#pass_edit").val()
      
      if (nombre!='' && telefono!='' && email!='' && direccion!='' && pass!='') {
		
			var parametros = Object.freeze({
				'editar':editar,
				'nombre':nombre,
				'telefono':telefono,
				'email':email,
				'direccion':direccion,
				'pass':pass,
				'request':'editarusuario',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/usuariosController.php',
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
				url:'../../controllers/usuariosController.php',
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
				url:'../../controllers/usuariosController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
					if (response != null){
						var data = JSON.parse(response)
						
						$("#idusuario").val(data.id);
						$("#nombre_edit").val(data.nombre);
						$("#telefono_edit").val(data.telefono);
						$("#correo_edit").val(data.correo);
						$("#direccion_edit").val(data.direccion);
						$("#pass_edit").val(data.pass);
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
				url:'../../controllers/usuariosController.php',
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
  			url:'../../controllers/usuariosController.php',
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
  			url:'../../controllers/usuariosController.php',
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
//
var puesto = "1";
 var parametros =({
				'puesto':puesto,
				'request':'puesto',
		});
  $.ajax({
	data: parametros,
	url:'../../controllers/usuariosController.php',
	type:'POST',
	beforeSend:function () {
     },
	success:function (response) {
	$("#consultarpuesto").html(response);
	}
});
//
 $(document).on("change",".selectpuesto",function(){
   var puestos = $("option:selected",this).data('id');
   $("#idpuesto").val(puestos);
   });