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

var consulta = "1";
 var parametros =({
				'consulta':consulta,
				'request':'consulta',
		});
  $.ajax({
	data: parametros,
	url:'../../controllers/empleadoController.php',
	type:'POST',
	beforeSend:function () {
     },
	success:function (response) {
	$("#resultado").html(response);
	}
});