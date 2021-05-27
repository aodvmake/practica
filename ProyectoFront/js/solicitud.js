$(document).ready(function(){
	$(document).on("click","#guardar",function(){	
	    var empresa = $("#resultadoempresa").val()
		var solicitud = $("#id_solicitud").val()
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
				url:'../../controllers/solicitudController.php',
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
						
						$("#tabla_detalles").html(data.tabla);
						$("#id_solicitud").val(data.idsol);
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
    $(document).on("click",".btnborrar",function(){
    	var btnborrar = $(this).data('id');
    	var solicitud = $("#id_solicitud").val()
	   		var parametros = Object.freeze({
		     'btnborrar':btnborrar,
		     'solicitud':solicitud,
		     'request':'btnborrar',
			});
			$.ajax({
			  data: parametros,
			  url:'../../controllers/solicitudController.php',
			  type:'POST',
			  beforeSend:function () {
		      },
			  success:function (response) {
			  	
			  	 if (response != null){
						var data = JSON.parse(response)
						
						$("#tabla_detalles").html(data.tabla);
						$("#id_solicitud").val(data.idsol);
						$("#cantidad").val("")
					    $("#codigo").val("")
					    $("#ncompra").val("")
					    $("#fecha_a").val("")
					    $("#fecha_c").val("")
					}
				}
		    });
    });
//
    $(document).on("click","#btnfinalizar",function(){
        var finalizar = $("#id_solicitud").val()
	   	 if(finalizar!=''){
	   		var parametros = Object.freeze({
		     'finalizar':finalizar,
		     'request':'finalizar',
			});
			$.ajax({
			  data: parametros,
			  url:'../../controllers/solicitudController.php',
			  type:'POST',
			  beforeSend:function () {
		      },
			  success:function (response) {
                alert(response);
                $("#id_solicitud").val("")
                document.location.reload();
				}
		    });
        }
        else{
        	alert("Primero llene el formato");
        }
    });
//
});
var consulta = "1";
 var parametros =({
				'consulta':consulta,
				'request':'consulta',
		});
  $.ajax({
	data: parametros,
	url:'../../controllers/solicitudController.php',
	type:'POST',
	beforeSend:function () {
     },
	success:function (response) {
	$("#resultadoempresa").html(response);
	}
});
//  	
var conp = "1";
var parametros =({
				'conp':conp,
				'request':'conp',
		});
  $.ajax({
	data: parametros,
	url:'../../controllers/solicitudController.php',
	type:'POST',
	beforeSend:function () {
     },
	success:function (conp) {
	$("#consultarpieza").html(conp);
	}
});
//
 $(document).on("change",".selectprecio",function(){
   var pieza = $("option:selected",this).data('id');
   var precio = $("#consultarpieza").val()
   $("#precio").val(precio);
   $("#id_pieza").val(pieza);
   });