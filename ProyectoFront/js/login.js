
 $(document).ready(function(){
	$("#entrar").click(function(){	
	    var email = $("#email").val()
		var pass = $("#pass").val()

		var parametros =Object.freeze({
			'email':email,
			'pass':pass,
			'request':'data',
		});

		$.ajax({
			data: parametros,
			url:'controllers/loginController.php',
			type:'POST',
			success:function(response){
				$("#email").val("")
				$("#pass").val("")
				switch(response){
					case 'Empleado':
						//window.location.href="views/cliente.php"
					break;
					case 'Almacenista':
						//window.location.href="views/cliente.php"
					break;
					case 'Administrador':
						window.location.href="views/asistente/homeAsistente.php"
					break;
					case 'King':
						window.location.href="views/admin/homeAdmin.php"
					break;
                    case 'Vacio':
						alert('Usuario o contraseña incorrecta');
					break;
				}
			}
		});
	});
});