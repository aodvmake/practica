$(document).ready(function(){
  $(document).on("click",".btn-actualizar",function(){
	   var btnactualizar = $(this).data('id');
	   var caja =$("#caja"+btnactualizar).val()
       var cantidad= $("#cantidad"+btnactualizar).val()

        if(caja>0 && caja<=cantidad){
	   		var parametros = Object.freeze({
		     'caja':caja,
		     'cantidad':cantidad,
		     'btnactualizar':btnactualizar,
		     'request':'btnactualizar',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/empleadoController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
                alert(response);
                document.location.reload();
				}
			}); 
		}
		else{
			alert("La cantidad ingresada tiene que ser menor a la cantidad especificada");
		}
	    });
//
});

//
	$(obtener_registro(''));
  	function obtener_registro(consulta) {
  		$.ajax({
  			url:'../../controllers/empleadoController.php',
  			type:'POST',
  			dataType:'html',
  			data:{'consulta':consulta,'request':'consulta'},
  		})
  		.done(function(resultado){
  			$("#resultado").html(resultado);
  		})
  	}
  	$(document).on('keyup','#busca',function(){
  		var valorBusqueda=Object.freeze($(this).val());
  		if (valorBusqueda!=""){
  			obtener_registro(valorBusqueda);
  		}
  		else{
  			obtener_registro('');
  		}
  	}); 