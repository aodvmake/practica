var consulta = "1";
 var parametros =({
				'consulta':consulta,
				'request':'consulta',
		});
  $.ajax({
	data: parametros,
	url:'../../controllers/adminController.php',
	type:'POST',
	beforeSend:function () {
     },
	success:function (response) {
	$("#notificaciones").html(response);
	}
});