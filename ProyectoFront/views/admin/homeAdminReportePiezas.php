<?php 
  include('../../controllers/sesionadm.php');
  include('../bases/baseH.php');
?>

<section class="container pt-5 pb-5">
	<div class="row">
		<div class="col-lg-6">
			<input type="search" name="" placeholder="Buscar pieza" id="busqueda" class="form-control">
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
				</tr>
			</thead>
			<tbody>
        <tr>
          <td>Nombre de la pieza</td>
          <td>Cantidad</td>
          <td>Avance</td>
          <td><button class="btn btn-primary">Actualizar</button></td>
        </tr>
			</tbody>
		</table>
	</div>
</section>

<?php 
  include('../bases/baseF.php');
?>
<script type="text/javascript" src="../../js/pieza.js"></script>