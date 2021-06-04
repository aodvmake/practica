$(document).ready(function(){
   $("#btnbuscar").click(function(){	
         
			var parametros = Object.freeze({
				'request':'consultar',
			});
			$.ajax({
				data: parametros,
				url:'../../controllers/editarsolicitudController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
			    $("#resultado").html(response);
				}
			 });
	      });
   //
   $(document).on("click",".btnseleccionar",function(){
	   var btnseleccionar = $(this).data('id');
	   		    
	   		var parametros = Object.freeze({
		     'btnseleccionar':btnseleccionar,
		     'request':'btnseleccionar',
			});
                  
			$.ajax({
				data: parametros,
				url:'../../controllers/editarsolicitudController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
					if (response != null){
						var data = JSON.parse(response)
						$("#solicitud").val(data.idsol);
						$("#datos").html(data.tabla);
						$("#id_em").val(data.empresa);
                        $("#nombre_em").val(data.nombre);
						$("#buscarSolicitud").modal('hide');
						$("#nombre_em").attr("readonly", true);
					} 
				}
			});
	    });
   //
   $(document).on("click",".btneliminar",function(){
            var btneliminar = $(this).data('id');
            var solicitud=  $("#solicitud").val();

	   		var parametros = Object.freeze({
		     'btneliminar':btneliminar,
		     'solicitud':solicitud,
		     'request':'btneliminar',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/editarsolicitudController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
					if (response != null){
						var data = JSON.parse(response)
						$("#solicitud").val(data.idsol);
						$("#datos").html(data.tabla);
						$("#id_em").val(data.empresa);
                        $("#nombre_em").val(data.nombre);
						$("#buscarSolicitud").modal('hide');
					} 
				  }
               });
         });
   //
   $(document).on("click","#guardar",function(){	
	    var empresa = $("#id_em").val()
		var solicitud = $("#solicitud").val()
		var pieza = $("#id_pieza").val()
		var precio =$("#precio").val()
		var cantidad =$("#cantidad").val()
        var codigo =$("#codigo").val()
        var ncompra =$("#ncompra").val()
        var fecha_c =$("#fecha_c").val()
        var fecha_a =$("#fecha_a").val()
      if (solicitud=='') {
      	solicitud='vacio';
      }
      
      if (empresa!='' && pieza!='' && precio!='' && cantidad!='' && codigo!='' && ncompra!='' && fecha_c!='' && fecha_a!='') {
			var parametros = Object.freeze({
				'empresa':empresa,
				'solicitud':solicitud,
				'pieza':pieza,
				'precio':precio,
				'cantidad':cantidad,
				'codigo':codigo,
				'ncompra':ncompra,
                'fecha_c':fecha_c,
                'fecha_a':fecha_a,
				'request':'save',
			});
		
			
			$.ajax({
				data: parametros,
				url:'../../controllers/editarsolicitudController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {

               if(response=='error'){
					alert("La fecha compromiso no puede ser menor a la fecha actual, ni tampoco la fecha aviso puede ser menor a 5 dias");
				  }
				 else{
				  	if (response != null){
						var data = JSON.parse(response)
						
						$("#solicitud").val(data.idsol);
						$("#datos").html(data.tabla);
						$("#id_em").val(data.empresa);
                        $("#nombre_em").val(data.nombre);
						$("#cantidad").val("")
					    $("#codigo").val("")
					    $("#ncompra").val("")
					    $("#fecha_a").val("")
					    $("#fecha_c").val("")
					} 
				  } 
				}
			 }); 
		   }
	    else{
	  	alert('LLene todo los datos');
	   }	
	  });
   //
  });

var conp = "1";
var parametros =({
				'conp':conp,
				'request':'conp',
		});
  $.ajax({
	data: parametros,
	url:'../../controllers/editarsolicitudController.php',
	type:'POST',
	beforeSend:function () {
     },
	success:function (conp) {
	$("#consultarpieza").html(conp);
	}
});

$(document).on("change",".selectprecio",function(){
   var pieza = $("option:selected",this).data('id');
   var precio = $("#consultarpieza").val()
   $("#precio").val(precio);
   $("#id_pieza").val(pieza);
   });