<?php 
session_start();
if ($_SESSION['email']){
 if ($_SESSION['tipo']=="King"){
   }
   else{
   eliminarsession();
   }
  }
 else{
    eliminarsession();
   }  
function eliminarsession(){
$_SESSION = array();

// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Finalmente, destruir la sesión.	
session_destroy();
header('location:../../index.html');
}
?>
