  	$(obtener_registro());
  	function obtener_registro(re) {
  		$.ajax({
  			url:'../../controllers/consulempresa.php',
  			type:'POST',
  			dataType:'html',
  			data:{re:re},
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
  			obtener_registro();
  		}
  	});
    