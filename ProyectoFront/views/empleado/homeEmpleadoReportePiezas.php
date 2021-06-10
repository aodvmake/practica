<?php 
  include('../../controllers/sesionempleado.php');
  include('../bases/baseHempleado.php');
?>
<body >
<section class="container pt-5 pb-5">
	<div class="row">
		<div class="col-lg-6">
			<input type="search" name="" placeholder="Buscar pieza" id="busca" class="form-control">
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nombre de la Pieza</th>
					<th>Cantidad</th>
					<th>Avance</th>
					<th></th>
          <th></th>
				</tr>
			</thead>
			<tbody id="resultado">
        <tr>
          <td>Nombre de la pieza</td>
          <td>Cantidad</td>
          <td><progress value="56" max="100"></td>
          <td><input type="number" class="form-control" id="cantidad_add"></td>
          <td><button class="btn btn-primary">Actualizar</button></td>
        </tr>
			</tbody>
		</table>
	</div>
</section>



<?php 
  include('../bases/baseF.php');
?>
<script type="text/javascript" src="../../js/reportepieza.js"></script>