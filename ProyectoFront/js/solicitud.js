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
