<html>
<head>
	<title>DINMVAZ - Administrador</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../css/styleAdmin.css">
</head>
<body>
<nav class="navbar navbar-expand-lg " style="background:#16161C;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Solicitud
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Crear Solicitud</a></li>
            <li><a class="dropdown-item" href="homeAdminSolicitudCompraEditar.php">Editar Solicitud</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reporte
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Estado actual</a></li>
            <li><a class="dropdown-item" href="homeAdminReporteEstadoActualGanancias.php">Reporte de Ganancias</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link font-main" aria-current="page" href="#">Uknown</a>
        </li>
        <li class="nav-item">
          <a class="nav-link font-main" aria-current="page" href="#">Uknown</a>
        </li>
      </ul>

      <ul class="navbar-nav mr-auto mb-lg-0">
      	<li class="nav-item pt-2-responsive">
          <a class="nav-link font-main" aria-current="page" href="homeAdmin.php"><?php // echo utf8_encode($_SESSION['trabajador']); ?></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../../img/userDefault.jpg" class="imgUserAdmin">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="../../controllers/cerrarsession.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>