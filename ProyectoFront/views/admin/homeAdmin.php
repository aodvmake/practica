<?php 
	include('../../controllers/sesionadm.php');
	include('../bases/baseH.php');
?>
<meta charset="utf-8">
<section class="container pt-5 pb-3">
	<div class="row">
		<div class="col-lg-8">
			<div class="row">
				<div class="col-12 pb-4">
					<p class="h3">Accesos directos</p>
				</div>
				<div class="col-md-4 pb-4">
					<a href="homeAdminEmpresa.php" class="no-underline">
						<div class="card card-acceso">
							<div class="card-body p-0 m-0 img-acceso">
								<img src="../../img/icon/equipo.png">
							</div>
							<div class="card-footer">
								Clientes
							</div>
						</div>
					</a>	
				</div>
				<div class="col-md-4 pb-4">
					<a href="homeAdminInventario.php" class="no-underline">
						<div class="card card-acceso">
							<div class="card-body p-0 m-0 img-acceso">
								<img src="../../img/icon/inventario.png">
							</div>
							<div class="card-footer">
								Inventario
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4 pb-4">
					<a href="homeAdminReporteEstadoActual.php" class="no-underline">
						<div class="card card-acceso">
							<div class="card-body p-0 m-0 img-acceso">
								<img src="../../img/icon/lista-de-verificacion.png">
							</div>
							<div class="card-footer">
								Estado actual
							</div>
						</div>
					</a>	
				</div>
				<div class="col-md-4 pb-4">
					<a href="homeAdminPieza.php" class="no-underline">
						<div class="card card-acceso">
							<div class="card-body p-0 m-0 img-acceso">
								<img src="../../img/icon/rejilla-de-tierra-con-simbolo-de-engranaje-de-medias-partes.png">
							</div>
							<div class="card-footer">
								Piezas
							</div>
						</div>
					</a>	
				</div>
				<div class="col-md-4 pb-4">
					<a href="homeAdminSolicitudCompraCrear.php" class="no-underline">
						<div class="card card-acceso">
							<div class="card-body p-0 m-0 img-acceso">
								<img src="../../img/icon/reporte.png">
							</div>
							<div class="card-footer">
								Crear Solicitud
							</div>
						</div>	
					</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="col-12 pb-4">
				<p class="h3">Notificaciones</p>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-footer" id="notificaciones">
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php 
	include('../bases/baseF.php');
?>
<script type="text/javascript" src="../../js/admin.js"></script>