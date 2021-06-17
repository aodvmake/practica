$(document).ready(function(){
    $(document).on("click",".btnpaso",function(){
     var btnpaso = $(this).data('id');
     var boxtime =$("#cantidad"+btnpaso).val()

            
        var parametros = Object.freeze({
         'boxtime':boxtime,
         'btnpaso':btnpaso,
         'request':'btnpaso',
      });

     $.ajax({
        data: parametros,
        url:'../../controllers/estadoactualController.php',
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
    $(document).on("click",".btnfallo",function(){
     var btnfallo = $(this).data('id');
     var boxtime =$("#cantidad"+btnfallo).val()

            
        var parametros = Object.freeze({
         'boxtime':boxtime,
         'btnfallo':btnfallo,
         'request':'btnfallo',
      });

     $.ajax({
        data: parametros,
        url:'../../controllers/estadoactualController.php',
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
//
  $(obtener_registro(''));
  	function obtener_registro(consulta) {
  		$.ajax({
  			url:'../../controllers/estadoactualController.php',
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
//
  $(obtener_registropieza(''));
    function obtener_registropieza(consultapiezas) {
      $.ajax({
        url:'../../controllers/estadoactualController.php',
        type:'POST',
        dataType:'html',
        data:{'consultapiezas':consultapiezas,'request':'consultapiezas'},
      })
      .done(function(resultadopieza){
        $("#resultadopieza").html(resultadopieza);
      })
    }
    $(document).on('keyup','#buscapieza',function(){
      var valorBusquedapieza=Object.freeze($(this).val());
      if (valorBusquedapieza!=""){
        obtener_registropieza(valorBusquedapieza);
      }
      else{
        obtener_registropieza('');
      }
    });      