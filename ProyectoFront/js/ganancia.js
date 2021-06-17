$(document).ready(function(){
   $("#btnconsultar").click(function(){
	    var empresa=$('#id_empresa').val()
        var fecha_p=$('#fecha_p').val()
        var fecha_f=$('#fecha_f').val()
			
			var parametros = Object.freeze({
				'empresa':empresa,
				'fecha_p':fecha_p,
				'fecha_f':fecha_f,
				'request':'btncons',
			});

			$.ajax({
				data: parametros,
				url:'../../controllers/estadoController.php',
				type:'POST',
				beforeSend:function () {
		        },
				success:function (response) {
					
					$("#reporteEstado").html(response);

				}
			});
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
	url:'../../controllers/estadoController.php',
	type:'POST',
	beforeSend:function () {
     },
	success:function (conp) {
	$("#consultarempresa").html(conp);
	}
});
//  
 $(document).on("change",".selectp",function(){
   var empresa = $("option:selected",this).data('id');
   $("#id_empresa").val(empresa);
   });