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
});


