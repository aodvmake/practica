
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
						//window.location.href="views/admin.php"
					break;
					case 'King':
						window.location.href="views/admin/homeAdmin.php"
						//alert('entro');
					break;
                    case 'Vacio':
						//window.location.href="views/adminki.php"
						alert('Usuario o contraseña incorrecta');
					break;
				}
			}
		});
	});
});