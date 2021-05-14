<?php 
  include('../bases/baseH.php');
?>

<section class="container pt-5 pb-5">
	<div class="row">
		<div class="col-lg-6">
			<input type="search" name="" id="busqueda" placeholder="Buscar empresa" class="form-control">
		</div>
		<div class="col-lg-3">
			<button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addEmpresa">Agregar una empresa</button>
		</div>
		<div class="col-lg-3">
			<button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#bajasTemporales">Baja temporal</button>
		</div>
	</div>

<!--empresa-->
	<div class="table-responsive" id="resultados">

  </div>


</section>

<!--Modals-->
<div class="modal fade" id="deleteEmpresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Baja temporal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">¿Seguro que desea dar de baja temporal la empresa?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="baja" value="">Aceptar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="bajasTemporales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="search" name="" placeholder="Buscar bajas temporales" class="form-control">
        <br>

        <div class="table-responsive">
        	<table class="table table-striped">
        		<thead>
        			<tr>
        				<th></th>
        				<th></th>
        			</tr>
        		</thead>
        		<tbody>
        			<tr>
        				<td>Nombre de la empresa</td>
        				<td><button class="btn btn-success">Activar</button></td>
        			</tr>
        			<tr>
        				<td>Nombre de la empresa</td>
        				<td><button class="btn btn-success">Activar</button></td>
        			</tr>
        			<tr>
        				<td>Nombre de la empresa</td>
        				<td><button class="btn btn-success">Activar</button></td>
        			</tr>
        			<tr>
        				<td>Nombre de la empresa</td>
        				<td><button class="btn btn-success">Activar</button></td>
        			</tr>
        			<tr>
        				<td>Nombre de la empresa</td>
        				<td><button class="btn btn-success">Activar</button></td>
        			</tr>
        			<tr>
        				<td>Nombre de la empresa</td>
        				<td><button class="btn btn-success">Activar</button></td>
        			</tr>
        		</tbody>
        	</table>
        </div>



      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addEmpresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar empresa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
	    	<label for="nombre" class="form-label">Nombre de la empresa</label>
	    	<input type="text" class="form-control" id="nombre">
	  	</div>
	  	<div class="mb-3">
	    	<label for="telefono" class="form-label">Telefono</label>
	    	<input type="number" class="form-control" id="telefono">
	  	</div>
	  	<div class="mb-3">
	    	<label for="email" class="form-label">Correo de la empresa</label>
	    	<input type="email" class="form-control" id="email">
	  	</div>
	  	<div class="mb-3">
	    	<label for="ubicacion" class="form-label">Ubicación</label>
	    	<input type="text" class="form-control" id="ubicacion">
	  	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editEmpresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar empresa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
	    	<label for="nombre" class="form-label">Nombre de la empresa</label>
	    	<input type="text" class="form-control" id="e-nombre">
	  	</div>
	  	<div class="mb-3">
	    	<label for="telefono" class="form-label">Telefono</label>
	    	<input type="number" class="form-control" id="e-telefono">
	  	</div>
	  	<div class="mb-3">
	    	<label for="email" class="form-label">Correo de la empresa</label>
	    	<input type="email" class="form-control" id="e-email">
	  	</div>
	  	<div class="mb-3">
	    	<label for="ubicacion" class="form-label">Ubicación</label>
	    	<input type="text" class="form-control" id="e-ubicacion">
	  	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="guardar-e" value="">Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php 
  include('../bases/baseF.php');
?>
<script type="text/javascript" src="../../js/buscarempresa.js"></script>
<script type="text/javascript" src="../../js/guardarempresa.js"></script>
<script type="text/javascript" src="../../js/editarempresa.js"></script>
<script type="text/javascript" src="../../js/editarempresamodal.js"></script>